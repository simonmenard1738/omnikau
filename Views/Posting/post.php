<?php

include_once 'Models/Posting.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>omnikau</title>

    <style>
        #brandName{
            font-feature-settings: 'clig' off, 'liga' off;
            font-family: 'Michroma', sans-serif;
            font-size: 36px;
            font-style: normal;
            font-weight: 400;
            line-height: 100%; /* 36px */
            letter-spacing: -0.36px;
        }

        .containers{
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
        }

        body{
           /** padding: 10px; */
        }

    </style>
</head>
<body>
        
    <!-- <h1 id="brandName" style="display: inline-block;">omnikau</h1> <h3 style="float: right;">[user]</h3> -->
    <?php include_once "header.php"; ?>
    <hr>

    <div id="mainContainer">

        <form action="?c=posting&a=poster" method="POST">

            <div id="detailsContainer" class="containers">

                <h3>Post Details</h3>
                <hr>
                Post Title: <input name="title">
                <div>
                    Post Type:
                    <div>
                        <input id="postTypeService" type="radio" name="postType" value="SERVICE" checked>
                        <label for="postTypeService">Service</label>
                    </div>
                    <div>
                        <input id="postTypeProduct" type="radio" name="postType" value="PRODUCT">
                        <label for="postTypeProduct">Product</label>
                    </div>
                </div>
                <div>
                    Price: <input name="price">
                </div>

                Description: <br>
                <textarea name="description" rows="7" cols="50" style="resize: vertical;"></textarea>
            </div>
    
            <div id="mediaContainer" class="containers">
                <h3>Media</h3>
                <h12 style="font-size: 10px;">This is a preview for the image upload, it is not available at the moment.</h12>
                <hr>

                Add photos to attract interest to your post.

                <ol id="MediaUploadedImages">
                    <li>
                        <div style="background-image: url(https://ca.classistatic.com/static/V/12299/img/placeHolder/generic.svg);">
                        </div>
                    </li>
                    <li>
                        <div style="background-image: url(https://ca.classistatic.com/static/V/12299/img/placeHolder/generic.svg);">
                        </div>
                    </li>
                    <li>
                        <div style="background-image: url(https://ca.classistatic.com/static/V/12299/img/placeHolder/generic.svg);">
                        </div>
                    </li>
                    <li>
                        <div style="background-image: url(https://ca.classistatic.com/static/V/12299/img/placeHolder/generic.svg);">
                        </div>
                    </li>
                </ol>

                <button id="ImageUploadButton" type="button" style="position: relative; z-index: 1;">Select Images</button>
            </div>

            <input type="submit" value="Publish Your Post" style="height: 50px; width: 130px;">
        </form>

    </div>
    

</body>
</html>