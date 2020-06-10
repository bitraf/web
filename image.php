<?
$path = $_GET['name'];

if (!preg_match('/^[A-Za-z0-9.-]*$/', $path) || !file_exists("/photos/{$path}"))
{
  header('HTTP/1.1 404 Not Found');
  echo "404 Not found";

  exit;
}

header('Content-Type: image/jpeg');

if (file_exists("/photos/scaled/{$path}"))
{
  readfile("/photos/scaled/{$path}");

  exit;
}

$data = @file_get_contents("/photos/{$path}");

function get_rotation($filename) {
  if (!function_exists('exif_read_data')) {
    return;
  }
  $exif = exif_read_data($filename);
  if(!$exif || !isset($exif['Orientation'])) {
    return;
  }
  $orientation = $exif['Orientation'];
  if ($orientation == 1) {
    return;
  }
  $img = imagecreatefromjpeg($filename);
  $deg = 0;
  switch ($orientation) {
    case 3:
      $deg = 180;
      break;
    case 6:
      $deg = 270;
      break;
    case 8:
      $deg = 90;
      break;
  }
  return $deg;
}

$image = @imagecreatefromstring($data);
$rotation = get_rotation("/photos/{$path}");
if ($rotation) {
  $image = imagerotate($image, $rotation, 0);
}

$old_width = imagesx($image);
$old_height = imagesy($image);

if (!$rotation && $old_width < 960)
{
  echo "$data";
  exit;
}

$new_width = 960;
$new_height = 960 * $old_height / $old_width;

$newimage = imagecreatetruecolor($new_width, $new_height);

imagecopyresampled($newimage, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

ob_start();
imagejpeg($newimage);
$data = ob_get_contents();
ob_end_clean();

echo "$data";

file_put_contents("/photos/scaled/{$path}", $data);
