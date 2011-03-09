<?php

// htmlviewer.php
// <strong class="highlight">convert</strong> a Word <strong class="highlight">doc</strong> <strong class="highlight">to</strong> an <strong class="highlight">HTML</strong> file

//$DocumentPath = str_replace("\\", "\", $DocumentPath);
$DocumentPath="c.doc";

// create an instance of the Word application
$word = new COM("word.application") or die("Unable <strong class='highlight'>to</strong> instantiate application object");

// creating an instance of the Word Document object
$wordDocument = new COM("word.document") or die("Unable <strong class='highlight'>to</strong> instantiate document object");
$word->Visible = 0;
// open up an empty document
$wordDocument = $word->Documents->Open($DocumentPath);

// create the filename for the <strong class="highlight">HTML</strong> version
$HTMLPath = substr_replace($DocumentPath, 'txt', -3, 3);

// save the document as <strong class="highlight">HTML</strong>
$wordDocument->SaveAs($HTMLPath, 3);

// clean up
$wordDocument = null;
$word->Quit();
$word = null;

// redirect the browser <strong class="highlight">to</strong> the newly-created document header("Location:". $HTMLPath);

header("Location:". $HTMLPath);
?>