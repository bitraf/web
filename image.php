<?
$path = $_GET['name'];

if (!preg_match('/^[A-Z0-9.]*$/', $path) || !file_exists("/photos/{$path}"))
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

$image = @imagecreatefromstring($data);

$old_width = imagesx($image);
$old_height = imagesy($image);

if ($old_width < 960)
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
