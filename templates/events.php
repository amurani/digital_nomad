<script type="text/x-handlebars-template" id="events-template">
  {{#each events}}
  <li class="event">
    <h4 class="event-name">{{getEventName name}}</h4>
    <div class="event-date">
      <span class="glyphicon glyphicon-calendar font-red"></span>
      <span>{{getEventDate start}}</span> -
      <span>{{getEventDate end}}</span>
    </div>
    <p class="event-description">{{getEventDescription description}}</p>
    <div class="text-right">
      <a href="{{url}}" target="_blank">Find out more &#187;</a>
    </div>
  </li>
  {{/each}}
</script>
