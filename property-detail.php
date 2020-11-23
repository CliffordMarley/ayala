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
      $details;
      if(isset($_GET['ref_id']) && !empty($_GET['ref_id'])){
        $queryString = "SELECT l.id, l.title, l.amount AS price, pt.type AS property_type, l.status, l.ref_code, l.contract, d.district_name AS district, l.location, l.rate, l.length, l.width, ag.firstname, ag.middlename, ag.lastname, ag.phone_number, ag.email_address, l.availability FROM listings l JOIN property_types pt ON l.type = pt.id JOIN districts d ON d.district_id = l.district JOIN agents ag ON ag.id = l.posted_by WHERE l.ref_code = ? AND (l.status != 'DELETED' && l.status != 'EXPIRED') LIMIT 1";

        $details = $conn->prepare($queryString);

        try{
          $ref_id = $_GET['ref_id'];

          $details->bind_param("s", $ref_id);
          $details->execute();

          $details = $details->get_result();

          $details = $details->fetch_assoc();

          $details['facilities'] = getFeatures($details['id']);
          $details['images'] = getImages($details['id']);
        }catch(Exception $e){
            header('buysalerent.php');
        }

      }else{
        header('buysalerent.php');
      }
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="./">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<!-- <h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div> -->

</div>



<div class="advertisement">
  <!-- <h4>Advertisements</h4> -->
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $details['title'] ?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        
        <?php
            for($i = 0; $i < count($details['images']); $i++){
              ?>
              <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo 'active';}?>"></li>
              <?php
            }
        ?>
      </ol>
      <div class="carousel-inner">

        <?php 
            for($i = 0; $i < count($details['images']); $i++){
              ?>
              <div class="item <?php if($i==0){echo 'active';}?>">
                <img src="<?php echo $details['images'][$i]?>" class="properties" alt="properties" />
              </div>
              <?php
            }
        ?>

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  


<div class="spacer">
<h4><span class="glyphicon glyphicon-time"></span> Availability</h4>
<p><?php
    if($details['status'] == 'OCCUPIED'){
      if($details['availability'] != "" && $details['availability'] != null){
        echo "Available on <p style='color:orangered;font-weight:bold;'>".$details['availability']."</p>";
      }
    }else{
      if($details['status'] == 'AVAILABLE'){
        echo "Current Status : <span style='color:green !important;font-weight: bold !important;'>".$details['status']."</span>";
      }else{
        echo "Current Status : <span style='color:red !important;font-weight: bold !important;'>".$details['status']."</span>";
      }
    }
?></p>
</div>
  <div class="spacer"><h4><span class="glyphicon glyphicon-info-sign"></span> Guide</h4>
  <p>If you would like to get in touch with the owners of this property, please proceed to pay a small service fee so that we can provide you with Property owners' contact details.</p>

  <p>Our aim is to erradicate middlemen (Agents) who will charge you exorbitant prices on a propety that you might not like after all. We aim to please!</p>

  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
  <a href="#" onclick="promptPayment()" >Pay to get location details</a>
<!-- <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div> -->
  </div>
  

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<label class="text-danger">
  <?php
      $ref_id = $_GET['ref_id'];
      $orders = $conn->query("SELECT COUNT(*) AS count FROM orders WHERE property='".$ref_id."' AND status = 'Paid'");
      if($orders){
        $row = $orders->fetch_assoc();
        if($row['count'] > 0){
            echo $row['count']." Other people are enquiring about this product!";
        }
      }
  ?>
</label>
<p class="price"><?php echo 'MK'.number_format($details['price']).'/'.$details['rate']; ?></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $details['location'].", ".$details['district'];?></p>
  
  <div class="profile">
  <button type="button" onclick="promptPayment()" class="ui button  positive fluid">
      VIEW LANDLORD's CONTACTS
  </button>
  <!-- <span class="glyphicon glyphicon-user"></span> Agent Details
  <p><?php /*echo $details['firstname']." ".$details['lastname'];?><br><?php echo $details['phone_number'];*/?></p> -->
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Features</h6>
    <div class="listing-detail">
        <?php
          foreach($details['facilities'] AS $feature){
            ?>
              <label for=""><?php echo $feature['quantity']." ".$feature['name'].", ";?></label>
            <?php
          }
        ?>
    </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form" id="contact_id">
                <input type="text" id="fullname" class="form-control" placeholder="Full Name"/>
                <input type="text" id="email" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" id="phone" class="form-control" placeholder="your number"/>
                <textarea rows="6" id="message" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="button" onclick="sendMessage()" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="ui modal mini text-center" id="payment_modal" style="height:60vh !important;margin-top:5%;margin:auto;">
  <div class="header">PAYMENT OPTION! <a href="#" onclick="closePaymentModal()"><h4><i class="icon close"></i></h4></a></div>
  <div class="content text-center">
    <h4>In order to be provided with property owner's contacts, you are required to make a once off payment of MK200.00. Click any of the below options to pay!</h4>
    <hr>

    <div class="row">
          <div class="col-12 text-center">
              <div class="ui image circular tiny">
                  <img src="./images/airtel_money.png" style="cursor:pointer;" onclick="unimplemented()" alt="">
              </div>
          </div>
          <div class="col-12"><div class="ui horizontal divider">OR</div></div>
          <div class="col-12 text-center">
          <div class="ui image circular tiny">
                  <img src="./images/mpamba.png" style="cursor:pointer;" onclick="payViaMpamba()" alt="">
              </div>
            </div>
    </div>
  </div>
</div>


<div class="ui modal mini text-center" id="mpamba_modal" style="height:60vh !important;margin-top:5%;margin:auto;">
  <div class="header">Pay Via Mpamba <a href="#" onclick="closePaymentModal()"><h4><i class="icon close"></i></h4></a></div>
  <div class="content ">
    <h4 class="text-center">Enter your mpamba phone number you will use to pay.</h4>
    <hr>

    <div class="form-row">
          <div class="col-12 form-group">
            <label for="">Phone Number: </label>
            <input type="tel" placeholder="099XXXXXXX" id="mpamba_number" class="form-control phone-field" required/>
          </div>
          <div class="col-12 form-group">
            <label for="">Confirm Phone Number: </label>
            <input type="tel" placeholder="Exactly like first numbser" id="mpamba_number2" class="form-control phone-field" required/>
          </div>
          <div class="col-6 offet-6 form-group">
              <button onclick="submitPhoneNumber('<?php echo $details['ref_code']?>')" class="ui button small fluid primary icon">Submit Phone <i class="icon check"></i></button>
          </div>
    </div>
  </div>
</div>


<script>
  function promptPayment(){
    $("#payment_modal").modal('show');
  }

  function unimplemented(){
    swal('Hey there!', 'This feature is under implementstion. Thank you for showing interest in our service!', 'info');
  }

  function payViaMpamba(){
    $("#payment_modal").modal('hide');
    $("#mpamba_modal").modal('show');
  }

  function closePaymentModal(){
    $("#mpamba_modal").modal('hide');

  }

  function submitPhoneNumber(ref_code){
    const phone_number = $("#mpamba_number").val();
    const phone_number2 = $("#mpamba_number2").val();
    if(!phone_number || phone_number == "" || phone_number == null || phone_number == typeof undefined){
      swal('Attention!', 'Invalid phone number!', 'warning');
      return;
    }

    if(phone_number != phone_number2){
      swal('Phone Not Confirmed!', 'Both phone fields should match!', 'warning');
      return;
    }
    $("#mpamba_modal").modal('hide');

    load('Submitting phone number...');

    const options = {
      method:"POST",
      header:{
        'Content-Type':'application/x-www-form-urlencoded'
      }
    };
    fetch(`${baseURL}/create_order.php?phone_number=${phone_number}&product_id=${ref_code}`, options)
    .then(res => res.json())
    .then(res => {
      stopLoad();
      swal('', res.message, res.status);
      if(res.status == 'success'){
          $("#mpamba_number").val('');
      }else{
        $("#mpamba_modal").modal('show');
      }
    })
    .catch( err =>{
      $("#mpamba_modal").modal('show');
      stopLoad();
      swal('Connection Error!', 'Something went wrong with the submission!', 'error');
    })
    
  }
</script>

<?php include'footer.php';?>