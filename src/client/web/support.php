<!doctype html>
<html class="no-js" lang="en">
<?php include("head.php") ?>

<body>
    <div class="main-wrapper">
        <div class="app" id="app">
         <?php 
         include("header.php"); 
         include("sidebar.php");
         ?>		
         <article class="content dashboard-page">
            <section class="section">
                <form name="item">
                    <div class="card card-block">
                        <div class="form-group row"> <label class="col-sm-2 form-control-label text-xs-right">
                            Subject:
                        </label>
                        <div class="col-sm-10"> <input class="form-control boxed" placeholder="" type="text"> </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right">
                            Description:
                        </label>
                        <div class="col-sm-10">
                            <div class="wyswyg">
                                <div class="toolbar ql-toolbar ql-snow">
                                    <span class="ql-format-group"><span title="Bold" class="ql-format-button ql-bold"></span><span class="ql-format-separator"></span><span title="Italic" class="ql-format-button ql-italic"></span><span class="ql-format-separator"></span><span title="Underline" class="ql-format-button ql-underline"></span><span class="ql-format-separator"></span><span title="Strikethrough" class="ql-format-button ql-strike"></span></span>
                                    <span class="ql-format-group">
                                        <span title="Text Color" class="ql-color ql-picker ql-color-picker"><span data-value="rgb(0, 0, 0)" class="ql-picker-label"></span><span class="ql-picker-options"><span style="background-color: rgb(0, 0, 0);" class="ql-picker-item ql-selected ql-primary-color" data-value="rgb(0, 0, 0)"></span><span style="background-color: rgb(230, 0, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(230, 0, 0)"></span><span style="background-color: rgb(255, 153, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(255, 153, 0)"></span><span style="background-color: rgb(255, 255, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(255, 255, 0)"></span><span style="background-color: rgb(0, 138, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(0, 138, 0)"></span><span style="background-color: rgb(0, 102, 204);" class="ql-picker-item ql-primary-color" data-value="rgb(0, 102, 204)"></span><span style="background-color: rgb(153, 51, 255);" class="ql-picker-item ql-primary-color" data-value="rgb(153, 51, 255)"></span><span style="background-color: rgb(255, 255, 255);" class="ql-picker-item" data-value="rgb(255, 255, 255)"></span><span style="background-color: rgb(250, 204, 204);" class="ql-picker-item" data-value="rgb(250, 204, 204)"></span><span style="background-color: rgb(255, 235, 204);" class="ql-picker-item" data-value="rgb(255, 235, 204)"></span><span style="background-color: rgb(255, 255, 204);" class="ql-picker-item" data-value="rgb(255, 255, 204)"></span><span style="background-color: rgb(204, 232, 204);" class="ql-picker-item" data-value="rgb(204, 232, 204)"></span><span style="background-color: rgb(204, 224, 245);" class="ql-picker-item" data-value="rgb(204, 224, 245)"></span><span style="background-color: rgb(235, 214, 255);" class="ql-picker-item" data-value="rgb(235, 214, 255)"></span><span style="background-color: rgb(187, 187, 187);" class="ql-picker-item" data-value="rgb(187, 187, 187)"></span><span style="background-color: rgb(240, 102, 102);" class="ql-picker-item" data-value="rgb(240, 102, 102)"></span><span style="background-color: rgb(255, 194, 102);" class="ql-picker-item" data-value="rgb(255, 194, 102)"></span><span style="background-color: rgb(255, 255, 102);" class="ql-picker-item" data-value="rgb(255, 255, 102)"></span><span style="background-color: rgb(102, 185, 102);" class="ql-picker-item" data-value="rgb(102, 185, 102)"></span><span style="background-color: rgb(102, 163, 224);" class="ql-picker-item" data-value="rgb(102, 163, 224)"></span><span style="background-color: rgb(194, 133, 255);" class="ql-picker-item" data-value="rgb(194, 133, 255)"></span><span style="background-color: rgb(136, 136, 136);" class="ql-picker-item" data-value="rgb(136, 136, 136)"></span><span style="background-color: rgb(161, 0, 0);" class="ql-picker-item" data-value="rgb(161, 0, 0)"></span><span style="background-color: rgb(178, 107, 0);" class="ql-picker-item" data-value="rgb(178, 107, 0)"></span><span style="background-color: rgb(178, 178, 0);" class="ql-picker-item" data-value="rgb(178, 178, 0)"></span><span style="background-color: rgb(0, 97, 0);" class="ql-picker-item" data-value="rgb(0, 97, 0)"></span><span style="background-color: rgb(0, 71, 178);" class="ql-picker-item" data-value="rgb(0, 71, 178)"></span><span style="background-color: rgb(107, 36, 178);" class="ql-picker-item" data-value="rgb(107, 36, 178)"></span><span style="background-color: rgb(68, 68, 68);" class="ql-picker-item" data-value="rgb(68, 68, 68)"></span><span style="background-color: rgb(92, 0, 0);" class="ql-picker-item" data-value="rgb(92, 0, 0)"></span><span style="background-color: rgb(102, 61, 0);" class="ql-picker-item" data-value="rgb(102, 61, 0)"></span><span style="background-color: rgb(102, 102, 0);" class="ql-picker-item" data-value="rgb(102, 102, 0)"></span><span style="background-color: rgb(0, 55, 0);" class="ql-picker-item" data-value="rgb(0, 55, 0)"></span><span style="background-color: rgb(0, 41, 102);" class="ql-picker-item" data-value="rgb(0, 41, 102)"></span><span style="background-color: rgb(61, 20, 102);" class="ql-picker-item" data-value="rgb(61, 20, 102)"></span></span></span>
                                        <select style="display: none;" title="Text Color" class="ql-color">
                                            <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected=""></option>
                                            <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                            <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                            <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                            <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                            <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                            <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                            <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                                            <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                            <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                            <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                            <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                            <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                            <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                            <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                            <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                            <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                            <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                            <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                            <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                            <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                            <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                            <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                            <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                            <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                            <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                            <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                            <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                            <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                            <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                            <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                            <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                            <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                            <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                            <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                                        </select>
                                        <span class="ql-format-separator"></span><span title="Background Color" class="ql-background ql-picker ql-color-picker"><span data-value="rgb(255, 255, 255)" class="ql-picker-label"></span><span class="ql-picker-options"><span style="background-color: rgb(0, 0, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(0, 0, 0)"></span><span style="background-color: rgb(230, 0, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(230, 0, 0)"></span><span style="background-color: rgb(255, 153, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(255, 153, 0)"></span><span style="background-color: rgb(255, 255, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(255, 255, 0)"></span><span style="background-color: rgb(0, 138, 0);" class="ql-picker-item ql-primary-color" data-value="rgb(0, 138, 0)"></span><span style="background-color: rgb(0, 102, 204);" class="ql-picker-item ql-primary-color" data-value="rgb(0, 102, 204)"></span><span style="background-color: rgb(153, 51, 255);" class="ql-picker-item ql-primary-color" data-value="rgb(153, 51, 255)"></span><span style="background-color: rgb(255, 255, 255);" class="ql-picker-item ql-selected" data-value="rgb(255, 255, 255)"></span><span style="background-color: rgb(250, 204, 204);" class="ql-picker-item" data-value="rgb(250, 204, 204)"></span><span style="background-color: rgb(255, 235, 204);" class="ql-picker-item" data-value="rgb(255, 235, 204)"></span><span style="background-color: rgb(255, 255, 204);" class="ql-picker-item" data-value="rgb(255, 255, 204)"></span><span style="background-color: rgb(204, 232, 204);" class="ql-picker-item" data-value="rgb(204, 232, 204)"></span><span style="background-color: rgb(204, 224, 245);" class="ql-picker-item" data-value="rgb(204, 224, 245)"></span><span style="background-color: rgb(235, 214, 255);" class="ql-picker-item" data-value="rgb(235, 214, 255)"></span><span style="background-color: rgb(187, 187, 187);" class="ql-picker-item" data-value="rgb(187, 187, 187)"></span><span style="background-color: rgb(240, 102, 102);" class="ql-picker-item" data-value="rgb(240, 102, 102)"></span><span style="background-color: rgb(255, 194, 102);" class="ql-picker-item" data-value="rgb(255, 194, 102)"></span><span style="background-color: rgb(255, 255, 102);" class="ql-picker-item" data-value="rgb(255, 255, 102)"></span><span style="background-color: rgb(102, 185, 102);" class="ql-picker-item" data-value="rgb(102, 185, 102)"></span><span style="background-color: rgb(102, 163, 224);" class="ql-picker-item" data-value="rgb(102, 163, 224)"></span><span style="background-color: rgb(194, 133, 255);" class="ql-picker-item" data-value="rgb(194, 133, 255)"></span><span style="background-color: rgb(136, 136, 136);" class="ql-picker-item" data-value="rgb(136, 136, 136)"></span><span style="background-color: rgb(161, 0, 0);" class="ql-picker-item" data-value="rgb(161, 0, 0)"></span><span style="background-color: rgb(178, 107, 0);" class="ql-picker-item" data-value="rgb(178, 107, 0)"></span><span style="background-color: rgb(178, 178, 0);" class="ql-picker-item" data-value="rgb(178, 178, 0)"></span><span style="background-color: rgb(0, 97, 0);" class="ql-picker-item" data-value="rgb(0, 97, 0)"></span><span style="background-color: rgb(0, 71, 178);" class="ql-picker-item" data-value="rgb(0, 71, 178)"></span><span style="background-color: rgb(107, 36, 178);" class="ql-picker-item" data-value="rgb(107, 36, 178)"></span><span style="background-color: rgb(68, 68, 68);" class="ql-picker-item" data-value="rgb(68, 68, 68)"></span><span style="background-color: rgb(92, 0, 0);" class="ql-picker-item" data-value="rgb(92, 0, 0)"></span><span style="background-color: rgb(102, 61, 0);" class="ql-picker-item" data-value="rgb(102, 61, 0)"></span><span style="background-color: rgb(102, 102, 0);" class="ql-picker-item" data-value="rgb(102, 102, 0)"></span><span style="background-color: rgb(0, 55, 0);" class="ql-picker-item" data-value="rgb(0, 55, 0)"></span><span style="background-color: rgb(0, 41, 102);" class="ql-picker-item" data-value="rgb(0, 41, 102)"></span><span style="background-color: rgb(61, 20, 102);" class="ql-picker-item" data-value="rgb(61, 20, 102)"></span></span></span>
                                        <select style="display: none;" title="Background Color" class="ql-background">
                                            <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                                            <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                            <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                            <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                            <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                            <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                            <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                            <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected=""></option>
                                            <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                            <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                            <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                            <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                            <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                            <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                            <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                            <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                            <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                            <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                            <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                            <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                            <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                            <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                            <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                            <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                            <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                            <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                            <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                            <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                            <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                            <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                            <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                            <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                            <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                            <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                            <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                                        </select>
                                    </span>
                                    <span class="ql-format-group">
                                        <span title="List" class="ql-format-button ql-list"></span><span class="ql-format-separator"></span><span title="Bullet" class="ql-format-button ql-bullet"></span><span class="ql-format-separator"></span><span title="Text Alignment" class="ql-align ql-picker"><span data-value="left" class="ql-picker-label"></span><span class="ql-picker-options"><span class="ql-picker-item ql-selected" data-value="left"></span><span class="ql-picker-item" data-value="center"></span><span class="ql-picker-item" data-value="right"></span><span class="ql-picker-item" data-value="justify"></span></span></span>
                                        <select style="display: none;" title="Text Alignment" class="ql-align">
                                            <option value="left" label="Left" selected=""></option>
                                            <option value="center" label="Center"></option>
                                            <option value="right" label="Right"></option>
                                            <option value="justify" label="Justify"></option>
                                        </select>
                                    </span>
                                    <span class="ql-format-group"><span title="Link" class="ql-format-button ql-link"></span><span class="ql-format-separator"></span><button type="button" title="Image" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-media"><i class="fa fa-image"></i> Media
                                </button></span><span class="ql-format-group"></span>
                            </div>
                            <!-- Create the editor container -->
                            <div class="editor ql-container ql-snow">
                            <div id="ql-editor-1" class="ql-editor" contenteditable="true">
                                </div>
                                <div tabindex="-1" class="ql-paste-manager" contenteditable="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                        Submit
                    </button> </div>
                </div>
            </div>
        </form>
    </section>                    
</article>
</div>
</div>
<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
<script src="js/vendor.js"></script>
<script src="js/app.js"></script>
</body>

</html>