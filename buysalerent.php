<?php include'header.php';?>

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Buy or Rent</span>
    <h2>Buy or Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    
    
    <div class="row">
    <div class="col-lg-12 mr-0">
              <select id="district" class="form-control">
                <option value="" selected >All Districts</option>
                <?php
                  $districts = $conn->query("SELECT district_id, district_name FROM districts ORDER BY district_name ASC");
                  if($districts){
                      while($row = $districts->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['district_id']; ?>"><?php echo $row['district_name']; ?></option>
                        <?php
                      }
                  }
                ?>
              </select>
            </div>
            <div class="col-lg-12">
            <input type="text" id='property_keyword' class="form-control" placeholder="Keyword">
            </div>
            <div class="col-lg-6 mr-0">
              <select id="contract_type" class="form-control">
                <option value="RENT" selected >Rent</option>
                <option value="SALE">Sale</option>
                <option value="" >Both</option>
              </select>
            </div>
            <div class="col-lg-6 ml-0">
              <select id="property_price" class="form-control">
                <option value="">All Prices</option>
                <option value="150000-200000">MK150,000 - MK200,000</option>
                <option value="200000-250000">MK200,000 - MK250,000</option>
                <option value="250000-300000">MK250,000 - MK300,000</option>
                <option value="300000->">MK300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select id="property_type" class="form-control">
                <option selected value="" >Property Type</option>
                <?php
                  $property_types = $conn->query('SELECT * FROM property_types');
                  if($property_types){
                    while($row = $property_types->fetch_assoc()){
                      ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
                      <?php
                    }
                  }
                ?>
              </select>
              </div>
          </div>
          <button type="button" id='searchBtn' class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<!-- <h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div> -->

</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100 </div>
  <div class="pull-right">
  <select class="form-control" id="results_order">
  <option value="">Sort by</option>
  <option value="ASC">Price: Low to High</option>
  <option value="DESC">Price: High to Low</option>
</select></div>

</div>
<div class="row" id="searchResultsListCanvas" style="clear:both;height:auto;positition:relative;">

     



</div>
<div class="row">
<div class="center">
<!-- <ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul> -->
</div>
</div>
</div>
</div>
</div>
</div>

<script src="js/search.jsx"></script>
<script>
  $(document).ready(()=>{
    searchProperty('onload','search');
  });
</script>

<?php include'footer.php';?>