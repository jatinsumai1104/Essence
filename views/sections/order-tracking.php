<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo "http://localhost/essence/assets/css/order-tracking.css";?>">
</head>
<body>
<!-- From the sketch I found on Dribbble : 
https://dribbble.com/shots/3266972-MIID-Order-Tracking-A-Category-Page/attachments/702143?project_id=436754
-->

<div class="background">
  <div class="container">
    <div class="row header text-center">
        <div class="col-xs-3 icon-back">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </div>
        <div class="col-xs-6 order">
          <div class="order-number">
            Order #1893-1
          </div>
          <div class="order-status">
            In transit
          </div>
        </div>
        <div class="col-xs-3 icon-brand">
          <span class="glyphicon glyphicon-th"></span>
        </div>
      </div>
    <div class="row content">
      <div class="timeline">
        <div class="item">
          <div class="item-label">
            <div class="item-label-date">
            10.11.2016
            </div>
            <div class="item-label-hour">
              01:15
            </div>
          </div>
          <div class="item-description">
            <div class="item-description-status">
              The shipment has been successfully delivered
            </div>
            <div class="item-description-location">
              Xiamen
            </div>
          </div>
        </div>
        <div class="item">
          <div class="item-label">
            <div class="item-label-date">
            13.11.2016
            </div>
            <div class="item-label-hour">
              12:38
            </div>
          </div>
          <div class="item-description">
            <div class="item-description-status">
              The shipment is ready to be picked up
            </div>
            <div class="item-description-location">
              Beijing
            </div>
          </div>
        </div>
        <div class="item">
          <div class="item-label">
            <div class="item-label-date">
              14.11.2016
            </div>
            <div class="item-label-hour">
              03:24
            </div>
          </div>
          <div class="item-description">
            <div class="item-description-status">
              The shipment has been processed in location
            </div>
            <div class="item-description-location">
              Beijing
            </div>
          </div>
        </div>
        <div class="item active">
          <div class="item-label">
            <div class="item-label-date">
            17.11.2016
            </div>
            <div class="item-label-hour">
              10:19
            </div>
          </div>
          <div class="item-description">
            <div class="item-description-status">
              The shipment has been processed in location
            </div>
            <div class="item-description-location">
              Tianjin
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<!--truck icon from: https://www.flaticon.com/free-icon/delivery-truck_259551-->
</body>
</html>