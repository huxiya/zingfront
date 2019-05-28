<?php
/**
先将word中格式为doc的文档转化为docx，用预处理程序将文档中的公式转化为swf图片格式，将word转化为xml格式，在获得xml中的内容转化为json格式。

因为docx文档，其实是一个压缩文件，用php的COM组件可以直接操作
**/
	$word = new COM("word.application") or die ("Could not initialise MS Word object.");
    $word->Documents->Open(realpath("resume.docx"));
 
    // Extract content.
    $content = (string) $word->ActiveDocument->Content;
 
    echo $content;
     
    $word->ActiveDocument->Close(false);
 
    $word->Quit();
    $word = null;
    unset($word); 
?>
