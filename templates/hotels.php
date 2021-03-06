<!-- <li class="listed-property clearfix">
  <div class="property-image pull-left">

  </div>
  <div class="property-content">
    <h3>Hotel Name</h3>
    <p>in the <u>name of neighbourood</u> neighbourood</p>
    <div class="text-right">
      <a class="btn btn-success view-rooms" href="#">
        <span class="glyphicon glyphicon-bed"></span>
        <span>View Rooms</span>
      </a>
    </div>
  </div>
</li> -->

<script type="text/x-handlebars-template" id="hotel-template">
  {{#each hotels}}
  <li class="listed-property clearfix">
    <div class="property-image">
      <img src="{{getHotelPhoto photos}}" />
    </div>
    <div class="property-content">
      <h3>{{ name }}</h3>
      <p>in the <span class="">{{address}}</span> neighbourood of <span class="">{{city}}</span></p>
      <p class="font-big">{{getNumberOfRooms rooms}} rooms available</p>
      <div class="rating">
        {{{getRating stars}}}
      </div>
      <div>
        <a class="btn btn-success view-rooms" href="#" data-hotel-id="{{hotel_id}}">
          <span class="glyphicon glyphicon-bed"></span>
          <span>View Rooms</span>
        </a>
      </div>
    </div>
  </li>
  {{/each}}
</script>
