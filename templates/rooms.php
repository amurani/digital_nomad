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
      <div class="pull-right">
        <h4 class="text-right">KES {{getPriceInShillings min_price}} - KES {{getPriceInShillings max_price}}</h4>
      </div>
      <h3 class="font-green">{{roomtype}}</h3>
      This room accomodates a <span class="font-green dashed">maximum of 2 people</span>
      with {{getRoomBedNumber bedding}} bedding options including:
      <ul>
        <li>2 Single bed(s)</li>
        <li>1 Extra-large double bed(s) (Super-king size)</li>
        {{#each bedDetails}}
          {{amount}} {{type}}
        {{/each}}
      </ul>

      <!-- Book room -->
      <div class="text-right">
        <a class="btn btn-success view-rooms" href="?user_id=<?php echo 1 ?>&hotel_id={{hotel_id}}&room_id={{room_id}}">
          <span class="glyphicon glyphicon-calendar"></span>
          <span>Book Room</span>
        </a>
      </div>
    </div>
  </li>
  {{/each}}
</script>
