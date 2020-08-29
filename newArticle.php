<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">New Article</h4>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">Article Title</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Post title">
              </div>
              <div class="form-group">
                <label for="summernote">Article Body</label>
                <textarea id="summernote" rows="20">

                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Search Engine Description</label>
                <textarea maxlength="150" class="form-control" placeholder="Type a brief description of your article here for search engines. 150 characters max"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Article Excerpt</label>
                <textarea maxlength="255" class="form-control" placeholder="Type a brief description of your article here for the website. 255 characters max"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">SEO Keywords</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Keywords - for search engines. Separate by comas. Eg.: hello, world, test keyword, testing">
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Assign to Author</label>
                    <div class="col-sm-9">

                      <select class="form-control" style="border:1px solid black; height: 50px">
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
                      <input type="text" class="form-control file-upload-info" placeholder="Image URL: https://example.com/img/img.jpg">
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Reviewer</label>
                    <div class="col-sm-9">

                      <select class="form-control" style="border:1px solid black; height: 50px">
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

                      <select class="form-control" style="border:1px solid black; height: 50px">
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

                      <select class="form-control" style="border:1px solid black; height: 50px">
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

                      <select class="form-control" style="border:1px solid black; height: 50px">
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

                      <select class="form-control" style="border:1px solid black; height: 50px">
                        <option>John Doe</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Series Heading</label>
                    <div class="col-sm-9">

                      <select class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL">Select One</option>
                        <option>Jane Doe</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tags</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="Input tags here. Separate by commas." class="form-control">
                    </div>
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-md-7">
                  <!--just to push this annoying button to the right-->
                </div>
                <input type="submit" class="btn btn-light pull-right" value="Preview"> &nbsp;
                <input type="submit" class="btn btn-default pull-right" value="Save Draft">&nbsp;
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