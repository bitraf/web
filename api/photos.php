<?php

/* Unreliable code that accepts an image from POST and stores it on the server. */

const SECRET_KEY = "424a0aa1fb662bd8b2981c9a0729f2ac1ce87495";
const PHOTOS_PATH = "/photos/";

if (validate_key($_REQUEST['key'])) {
    processRequest($_SERVER['REQUEST_METHOD']);   
} else {
    die("Nothing to see here.");
}

function validate_key($key)
{
    return strcmp($key, SECRET_KEY) == 0; 
}

function processRequest($method)
{
    if ($method == 'POST')
	uploadImage();

    // Only supports adding new pictures currently.
}


function uploadImage()
{
    // Upload file

    $suffix = pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);

    if ($suffix != "jpg")
	die("Only jpg supported\n");

    $photoname = tempnam(PHOTOS_PATH, "photo-") . ".jpg";

    $result = move_uploaded_file($_FILES['imagefile']['tmp_name'], $photoname);

    if ($result)
	print "Upload ok.\n";
    else
	print "Upload failed.\n";

    // Add description

    $descfile = $photoname . ".txt";
    $result = file_put_contents($descfile, $_REQUEST['description']);

    if ($result)
	print "Description ok.\n";
    else
	print "Description failed.\n";
}

?>
