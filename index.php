<?php include'header.php';


function getImages($property){
  $images_query = $GLOBALS['conn']->query("SELECT url FROM property_images WHERE property = '$property'");
  if($images_query){
      $image_array = array();
      while($image = $images_query->fetch_assoc()){
          $image_array[] = $image['url'];
      }
      return $image_array;
  }else{
      return array();
  }
}

function getFeatures($property){
  $query = $GLOBALS['conn']->query("SELECT f.name, pf.quantity FROM property_facilities pf JOIN facilities f ON pf.facility = f.id WHERE pf.property = '$property' ");

  if($query){
      $rows = array();
      while($row = $query->fetch_assoc()){
          $rows[] = $row;
      }
      return $rows;
  }else{
      return array();
  }
}

?>

<?php
      $queryString = "SELECT l.id, l.title, l.amount AS price, pt.type AS property_type, l.status, l.ref_code, l.contract, d.district_name AS district, l.location, l.rate, l.length, l.width, ag.firstname, ag.middlename, ag.lastname, ag.phone_number, ag.email_address FROM listings l JOIN property_types pt ON l.type = pt.id JOIN districts d ON d.district_id = l.district JOIN agents ag ON ag.id = l.posted_by WHERE  (l.status != 'DELETED' && l.status != 'EXPIRED') ORDER BY RAND() LIMIT 10";

      $query = $conn->query($queryString);
?>

<div class="">
    

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>MK 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>MK 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>MK 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>MK 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>MK 20,000,000</cite>
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" id="property_keyword" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
            <select id="contract_type" class="form-control">
                <option value="RENT" selected >Rent</option>
                <option value="SALE">Sale</option>
                <option value="" >Both</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select id="property_price" class="form-control">
                <option value="">All Prices</option>
                <option value="150000-200000">MK150,000 - MK200,000</option>
                <option value="200000-250000">MK200,000 - MK250,000</option>
                <option value="250000-300000">MK250,000 - MK300,000</option>
                <option value="300000->">MK300,000 - above</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
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
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success" type="button"  onclick="prepareSearch();">Find Now</button>
              </div>
          </div>
          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">

          <?php

            while($details = $query->fetch_assoc()){
              $details['images'] = getImages($details['id']);
              $details['features'] = getFeatures($details['id']);
              ?>
                <div class="properties">
                <div class="image-holder"><img src="<?php echo $details['images'][0]; ?>" class="img-responsive" alt="properties"/>
                  <div class="status sold"><?php echo $details['status']; ?></div>
                </div>
                <h4><a href="property-detail.php"><?php echo $details['title']; ?></a></h4>
                <p class="price">Price: MK<?php echo number_format($details['price'])."/".$details['rate'];?></p>
                <div class="listing-detail"  style="height:60px;">
                  <?php
                       for($i = 0; $i < count($details['features']); $i++){
                          ?>
                            <label ><?php echo $details['features'][$i]['quantity']." ".$details['features'][$i]['name'].", "?></label>
                          <?php
                          if($i >= 5){
                            break;
                          }
                       }
                       if(count($details['features']) <= 0){
                          echo "<h4 style='color:#aaaaaa;font-family:Yu Gothic;'>No Facilities Added</h4>";
                       }
                  ?>
                </div>
                <a class="btn btn-primary" href="property-detail.php?ref_id=<?php echo $details['ref_code']?>">View Details</a>
              </div>
              <?php
            }
          ?>      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>At Ayala Real Estate Company, you are number one. Whether you are a property owner, tenant, or buyer, we value your business and will provide you with the individual attention and service you deserve. We believe in a strict Code of Ethics. We believe in integrity, commitment to excellence, a professional attitude, and personalized care...</p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommended Properties</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
          <?php
                $x = 0;
               $query2 = $conn->query($queryString);
                while($row = $query2->fetch_assoc()){
                    ?>
                      <li data-target="#myCarousel" data-slide-to="<?php echo $x;?>" class="<?php if($x == 0){ echo 'active';}?>"></li>
                    <?php
                    $x++;
                }
          ?>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">

                <?php
                  $i = 0;
                  $query3 = $conn->query($queryString);
                  while($details = $query3->fetch_assoc()){
                    $details['images'] = getImages($details['id']);
                    $details['features'] = getFeatures($details['id']);
                      ?>
                           <div class="item <?php if($i == 0){echo 'active';}?>">
                          <div class="row">
                            <div class="col-lg-4"><img src="<?php echo $details['images'][0];?>" class="img-responsive" alt="properties"/></div>
                            <div class="col-lg-8">
                              <h5><a href="property-detail.php"><?php echo $details['title'];?></a></h5>
                              <p class="price">MK<?php echo number_format($details['price']);?></p>
                              <a href="property-detail.php?ref_id=<?php echo $details['ref_code'];?>" class="more">More Details</a> </div>
                          </div>
                        </div>
                      <?php
                      $i++;
                  }
                
                ?>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<script>

 $(document).ready(()=>{
  //searchProperty('onload','home');
 });

  
function prepareSearch(){
    let searchParam = {
        property_keyword:$("#property_keyword").val().toString(),
        contract_type:$("#contract_type").val().toString(),
        property_type:$('#property_type').val().toString(),
        property_price:$("#property_price").val().toString(),
        amount_order: $("#results_order").val()
    }

    localStorage.setItem('searchParams', JSON.stringify(searchParam));
    window.location.href = 'buysalerent.php';
}
</script>

<?php include'footer.php';?>