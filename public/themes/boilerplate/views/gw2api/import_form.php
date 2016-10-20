<script>
    function makerequest(form) {
        var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
        
        var elem = document.getElementById("status");
        document.getElementById("submit").setAttribute("disabled", "disabled");

        elem.innerHTML = 'fetching data... this can take a minute!';

        xmlhttp.open("POST", "{##form_action##}", true);
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest"); // this makes it work with Toro
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(form.children["0"].name);
        xmlhttp.onloadend = function () {
            var response = xmlhttp.responseText;
            elem.innerHTML = response;
            document.getElementById("submit").removeAttribute("disabled");
        };
    };
</script>
<h3>Import data</h3>
<p>Please use the import function as little as possible as it is still in early development and may cause heavy use of the GW2-API.</p>
<p>I recommend to create a GW2-API key containing just 'account' and 'characters' for now, especially if you have a lot of Characters :)</p>
<section class="settings form">
    <form method="post" action="{##form_action##}" onsubmit="event.preventDefault(); makerequest(this)">
        <input type="submit" id="submit" name="gw2api_import[submit]" value="{##gw2api_import_submit_text##}" />
        <span id="status">({##import_status##})</span>
    </form>
</section>
