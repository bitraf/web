<?
header('Content-Type: text/html;charset=utf-8');

date_default_timezone_set ('Europe/Oslo');
setlocale(LC_ALL, 'nb_NO.UTF-8');

$this_month = strftime('%Y-%m');

$photodir = opendir("/photos");
$photos = array();
$months = array();

while ($ent = readdir($photodir))
{
  if ($ent[0] == '.')
    continue;

  $extension = pathinfo($ent, PATHINFO_EXTENSION);

  $description_path = "/photos/$ent.txt";

  if (!file_exists($description_path))
    continue;

  $path = "/photos/$ent";

  $mtime = filemtime($path);

  $name = "photos/$ent";

  $photos[] = array('name' => $name,
    'mtime' => strftime('%Y-%m-%d %H:%M:%S', $mtime),
    'machine_day' => strftime('%Y-%m-%d', $mtime),
    'day' => strftime('%A %e. %B, %Y', $mtime),
    'description' => file_get_contents($description_path));

  $months[] = strftime('%Y-%m', $mtime);
}

function mtimecmp($lhs, $rhs)
{
  return strcmp($rhs['mtime'], $lhs['mtime']);
}

usort($photos, mtimecmp);

$days = array();
$descriptions = array();
?>
<html>
  <head>
    <title>Bitraf: Galleri</title>
    <style type='text/css'>
      body { font-family: sans-serif; background: #333; color: #ccd0cc; text-align: center; }
      .photo { width: 960px; margin: 0 auto 10px; }
      .photo { background: black; padding: 0 0 5px; color: white; border: 2px solid black; text-align: center; }
      .photo img { margin-bottom: 5px; }
      .photo div { margin: 0 5px; text-align: left; }
      .t { border-spacing: 0; border-collapse: collapse; }
      .t td, .t th { padding: 5px 10px; border: 1px solid black; }
      .t th { background: #ddd; }
      a { color: #eee; }
      a:hover { color: #fff; }
    </style>
  </head>
  <body>
    <h1>Galleri</h1>
    <p><a href='/'>Tilbake til forsiden</a>
<?
foreach ($photos as $photo)
{
  if ($photo['day'] != $day)
  {
    $day = $photo['day'];
    $machine_day = $photo['machine_day'];
    ?><h2><?=$day?><?
    if ($days[$machine_day])
    {
      ?> &mdash; <?=$days[$machine_day]?><?
    }
    ?></h2><?
  }

  list($width, $height, $type, $attr) = getimagesize($photo['name']);
  ?><div class='photo'><img src='<?=$photo['name']?>' height='<?=$height?>' alt='' /><div><?=$photo['description']?></div></div><?
}
?>
  </body>
</html>
