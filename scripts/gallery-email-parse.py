#!/usr/bin/python

import os
import sys
import email
import errno
import mimetypes
import requests
import urllib2
import base64
import StringIO


def main():
    msg = email.message_from_string(sys.stdin.read())

    for part in msg.walk():
        if (part.get_content_type() == "image/jpeg"):

            subject = unicode(getheader(msg["subject"]))
            author = unicode(getheader(msg["from"]))
            payload = part.get_payload(decode=True)
            filename = part.get_filename().decode('ascii', 'ignore')

            upload_image(subject, author, payload, filename)

            # Only one image per email
            break

    print "Done walking."

def upload_image(description, author, imagedata, filename):
#    print filename
#    print author
#    print description
#    print "Uploading image " + filename + " from " + author + " with description " + description

    apiurl = "https://bitraf.no/api/photos.php"
    testurl = "http://httpbin.org/post"
    secret_key = "########################################"

    encoded_image = base64.b64encode(imagedata)

#    print type(encoded_image)
#    print len(encoded_image)

    files = {'imagefile': (filename, imagedata) }
    payload = {'key': secret_key, 'description': description}

    r = requests.post(apiurl, files=files, data=payload)

    print r.text

def getheader(header_text, default="ascii"):
    """Decode the specified header"""
    # Borrowed from: http://ginstrom.com/scribbles/2007/11/19/parsing-multilingual-email-with-python/

    headers = email.Header.decode_header(header_text)
    header_sections = [unicode(text, charset or default)
                        for text, charset in headers]
    return u" ".join(header_sections)


if __name__ == '__main__':
    main()
