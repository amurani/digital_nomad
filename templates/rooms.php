<!-- <li class="avialable-room-details font-big">
  <div class="row">
    <div class="col-md-6">
      <h3>Cost</h3>
    </div>
    <div class="col-md-6 text-right">
      <h3>USD 295 - USD 453</h3>
    </div>
  </div>
  This is a <span class="font-green dashed">2 person suite</span> with 2 bedding options including
  <ul>
    <li>2 Single bed(s)</li>
    <li>1 Extra-large double bed(s) (Super-king size)</li>
  </ul>
  It accomodates a <span class="font-green dashed">maximum of 2 people</span>
  <div class="text-right">
    <a class="btn btn-success view-rooms" href="#">
      <span class="glyphicon glyphicon-calendar"></span>
      <span>Book Room</span>
    </a>
  </div>
</li> -->

<script type="text/x-handlebars-template" id="available-room-template">
  {{#each rooms}}
  <li class="avialable-room-details font-big">
    <div class="room-image" style="background-image: url({{hotelImage}});"></div>
    <div class="room-details">
      This is a <span class="font-green dashed">{{max_persons}} person {{roomtype}}</span>
      with {{getRoomBedNumber bedding}} bedding options including
      <ul>
        <li>2 Single bed(s)</li>
        <li>1 Extra-large double bed(s) (Super-king size)</li>
        {{#each bedDetails}}
          {{amount}} {{type}}
        {{/each}}
      </ul>
      It accomodates a <span class="font-green dashed">maximum of 2 people</span>
      <div class="row">
        <div class="col-md-6">
          
        </div>
        <div class="col-md-6 text-right">
          <h4>USD {{min_price}} - USD {{max_price}}</h4>
        </div>
      </div>

      <!-- Book room -->
      <div class="text-right">
        <a class="btn btn-success view-rooms" href="#" data-hotel-id="{{hotel_id}}" data-room-id="{{room_id}}">
          <span class="glyphicon glyphicon-calendar"></span>
          <span>Book Room</span>
        </a>
      </div>
    </div>
  </li>
  {{/each}}
</script>
