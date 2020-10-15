<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");

$tableName = "hc_series";
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">New Article</h4>
            <button id="open-btn"></button>
            <script src="https://media-library.cloudinary.com/global/all.js"></script>

            <script>
              window.ml = cloudinary.createMediaLibrary({
                  cloud_name: 'healthcabal',
                  api_key: '784794767148191',
                  username: 'healthcabal@gmail.com',
                  button_class: 'myBtn btn btn-primary pull-right',
                  button_caption: 'Select Image',
                }, {
                  insertHandler: function(data) {
                    data.assets.forEach(asset => {
                      console.log("Inserted asset:",
                        JSON.stringify(asset, null, 2))
                    })
                  }
                },
                document.getElementById("open-btn")
              )
            </script>
            <!---Media Library widget ends here---->

            <!----Upload button starts here--->
            <button id="upload_widget" class="cloudinary-button btn btn-primary pull-right">Upload files</button>

            <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

            <script type="text/javascript">
              var myWidget = cloudinary.createUploadWidget({
                cloudName: 'healthcabal',
                uploadPreset: 'my_preset'
              }, (error, result) => {
                if (!error && result && result.event === "success") {
                  console.log('Done! Here is the image info: ', result.info);
                }
              })

              document.getElementById("upload_widget").addEventListener("click", function() {
                myWidget.open();
              }, false);
            </script>

            <form class="forms-sample" method="POST" action="modules/savearticle.php">
              <div class="form-group">
                <label for="exampleInputName1">Article Title</label>
                <input type="text" class="form-control" name="posttitle" id="posttitle" placeholder="Post title">
              </div>
              <div class="form-group">
                <label for="summernote">Article Body</label>
                <textarea name="summernote" id="summernote" rows="20">

                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Search Engine Description</label>
                <textarea maxlength="150" class="form-control" name="seodescription" id="seodescription" placeholder="Type a brief description of your article here for search engines. 150 characters max"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Article Excerpt</label>
                <textarea maxlength="255" class="form-control" name="excerpt" name="excerpt" placeholder="Type a brief description of your article here for the website. 255 characters max"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">SEO Keywords</label>
                <input type="text" class="form-control" name="keywords" id="keywords" id="exampleInputName1" placeholder="Keywords - for search engines. Separate by comas. Eg.: hello, world, test keyword, testing">
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Assign to Author</label>
                    <div class="col-sm-9">

                      <select class="form-control" name="author" id="author" style="border:1px solid black; height: 50px">
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Featured Image</label>
                    <div class="col-sm-9">
                      <input type="text" name="featuredimg" id="featuredimg" class="form-control" placeholder="Image URL: https://example.com/img/img.jpg">
                    </div>
                  </div>
                </div>
                <!--stopped here--->

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Reviewer</label>
                    <div class="col-sm-9">

                      <select name="reviewer" class="form-control" style="border:1px solid black; height: 50px">
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sponsored Post?</label>
                    <div class="col-sm-9">

                      <select name="sponsored" class="form-control" style="border:1px solid black; height: 50px">
                        <option>Sponsored</option>
                        <option>Not Sponsored</option>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Parent Category</label>
                    <div class="col-sm-9">

                      <select name="parentcat" class="form-control" style="border:1px solid black; height: 50px">
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Child Category</label>
                    <div class="col-sm-9">

                      <select name="childcat" class="form-control" style="border:1px solid black; height: 50px">
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Series</label>
                    <div class="col-sm-9">

                      <select name="series" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL" selected="selected" disabled="disabled">Select Series (if applicable)</option>
                        <?php $crudmethods->fetchSeries($conn, $tableName); ?>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Series Heading</label>
                    <div class="col-sm-9">

                      <select name="seriesheading" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL" disabled="disabled" selected="selected">Select One</option>
                        <option value="Overview">Overview</option>
                        <option value="Symptoms">Symptoms</option>
                        <option value="Causes">Causes</option>
                        <option value="Diagnosis">Diagnosis</option>
                        <option value="Treatment">Treatment</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tags</label>
                    <div class="col-sm-9">
                      <input name="tags" type="text" placeholder="Input tags here. Separate by commas." class="form-control">
                    </div>
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-md-7">
                  <!--just to push this annoying button to the right-->
                </div>
                <!--input type="submit" class="btn btn-light pull-right" value="Preview"> &nbsp;
                <input type="submit" class="btn btn-default pull-right" value="Save Draft"-->&nbsp;
                <input type="submit" class="btn btn-primary pull-right" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

  require_once("inc/footer.php");
  ?>