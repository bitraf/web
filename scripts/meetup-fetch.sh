#!/bin/bash

# NOTE(mastensg 2019-12-08): disabled because meetup has a new auth scheme.
exit 0

GROUP="$1"
shift

if [ -z "$GROUP" ]; then
  echo >&2 "Usage: $0 GROUP"
  exit 1
fi

TMPFILE=$(mktemp /var/lib/bitweb/meetup.XXXXXX)

trap 'rm -f $TMPFILE' ERR INT

MEETUP_KEY="$(cat /etc/meetup.key 2>/dev/null)"

if [ -z "$MEETUP_KEY" ]; then
  echo >&2 "/etc/meetup.key unreadable"
  exit 1
fi

curl --retry 3 -s "https://api.meetup.com/2/events?key=$MEETUP_KEY&sign=true&group_urlname=$GROUP&page=20&fields=featured" > "$TMPFILE" || exit 1

# Ignore CloudFlare error reports.
grep -q -F '<html>' "$TMPFILE" && exit 0

if ! head -c 1 "$TMPFILE" | grep -q -F '{'; then
  # This happens a lot and the only solution is waiting.
  #echo >&2 "Response from api.meetup.com was successful, but did not contain a JSON object."
  #echo >&2 "This is typical when meetup.com is 'experiencing some technical difficulties'."
  exit 0
fi

LINES=$(json_xs < "$TMPFILE" | wc -l)

if [ $LINES -lt 50 ]; then
  echo >&2 "Response from api.meetup.com was less than 50 lines after formatting"
  cat "$TMPFILE"
  exit 1
fi

chmod a+r "$TMPFILE"

mv -f "$TMPFILE" /var/lib/bitweb/meetup."$GROUP"
