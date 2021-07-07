<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");

$tableName = "hc_series";
$article_id = $_REQUEST['article_id'];
$query = "SELECT * FROM hc_posts WHERE ID = $article_id";
$article = $conn->query($query);
$articleInfo = $article->fetch_assoc();
//var_dump($articleInfo);

?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">Edit Article</h4>
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
            <button id="upload_widget" class="cloudinary-button btn btn-primary pull-right">Upload
              files</button>

            <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

            <script type="text/javascript">
              var myWidget = cloudinary.createUploadWidget({
                cloudName: 'healthcabal',
                uploadPreset: 'hc_articles'
              }, (error, result) => {
                if (!error && result && result.event === "success") {
                  console.log('Done! Here is the image info: ', result.info);
                }
              })

              document.getElementById("upload_widget").addEventListener("click", function() {
                myWidget.open();
              }, false);
            </script>

            <form class="forms-sample" method="POST" action="modules/edit-article.php">
              <div class="form-group">
                <label for="exampleInputName1">Article Title</label>
                <input type="text" class="form-control" name="posttitle" id="posttitle" placeholder="Post title" required="required" value="<?php echo $articleInfo['post_title']; ?>">
              </div>
              <div class="form-group">
                <label for="body">Article Body</label>
                <textarea name="body" id="" rows="20" required="required">
<?php
echo $articleInfo['post_content'];
?>
                </textarea>

                <script>
                  tinymce.init({
                    selector: 'textarea',
                    plugins: 'advcode casechange formatpainter autolink link lists checklist media mediaembed pageembed permanentpen powerpaste table advtable',
                    toolbar: 'addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table link numlist bullist',

                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                  });
                </script>
              </div>

<input type="hidden" value="<?php echo $_GET['article_id']; ?>" name="post_id">
              <!---div class="form-group">
                <label for="exampleInputPassword4">Article Slug</label>
                <input type="text" maxlength="150" value="<?php //echo $articleInfo['post_slug'] ?>" class="form-control" name="postslug" id="postslug" required="required">
              </div-->

              <div class="form-group">
                <label for="exampleInputPassword4">Search Engine Description</label>
                <input type="text" maxlength="150" value="<?php echo $articleInfo['post_seo_desc'] ?>" class="form-control" name="seodescription" id="seodescription" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Article Excerpt</label>
                <input type="text" required="required" value="<?php echo $articleInfo['post_excerpt'] ?>" maxlength="255" class="form-control" name="excerpt" />
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">SEO Keywords</label>
                <input type="text" required="required" value="<?php echo $articleInfo['post_keywords'] ?>" class="form-control" name="keywords" id="keywords" />
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Assign to Author</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="author" id="author" style="border:1px solid black; height: 50px" required="required">
                        <option value="NULL">Not for an author</option>
                        <?php
                        $dataLoad->fetchAuthorsDropdown($conn);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Featured Image</label>
                    <div class="col-sm-9">
                      <input type="text" required="required" name="featuredimg" id="featuredimg" class="form-control" value="<?php echo $articleInfo['post_featured_img'] ?>" />
                    </div>
                  </div>
                </div>
                <!--stopped here--->

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Reviewer</label>
                    <div class="col-sm-9">

                      <select required="required" name="reviewer" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL">No Reviewer</option>
                        <?php
                        $dataLoad->fetchAuthorsDropdown($conn);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sponsored Post?</label>
                    <div class="col-sm-9">

                      <select required="required" name="sponsored" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="0">Not Sponsored</option>
                        <option value="1">Sponsored</option>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Parent Category</label>
                    <div class="col-sm-9">

                      <select required="required" name="parentcat" class="form-control" style="border:1px solid black; height: 50px">
                        <?php
                        $dataLoad->fetchParentCategories($conn);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Child Category</label>
                    <div class="col-sm-9">

                      <select required="required" name="childcat" class="form-control" style="border:1px solid black; height: 50px">
                        <?php
                        //$dataLoad->fetchChildCategories($conn);
                        ?>
                        <option value="0">NULL</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Series</label>
                    <div class="col-sm-9">

                      <select required="required" name="series" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL" selected="selected" disabled="disabled">Select
                          Series (if applicable)</option>
                        <?php
                        $dataLoad->fetchSeries($conn);
                        ?>
                      </select>
                      </select>
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Series Heading</label>
                    <div class="col-sm-9">

                      <select required="required" name="seriesheading" class="form-control" style="border:1px solid black; height: 50px">
                        <option value="NULL" disabled="disabled" selected="selected">Select One
                        </option>
                        <?php
                        $dataLoad->fetchSeries($conn);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tags</label>
                    <div class="col-sm-9">
                      <input required="required" name="tags" type="text" value="<?php echo $articleInfo['post_tag'] ?>" class="form-control">
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