<script type="text/javascript">
function toggle(div){
    if (document.getElementById(div).className == 'hidden') {
        document.getElementById(div).className = '';
    } else {
        document.getElementById(div).className = 'hidden';
    }
}
</script>
<section class="form">
    <p>Together we are strong!</p>
    <form method="post" action="{##form_action##}">
        <fieldset>
            <legend>General event settings</legend>
            <input type="text" name="activity[title]" placeholder="{##activity_title_text##}" value="{##activity_title##}" /> {##activity_title_validation##}<br />
            <select name="activity[event_type]">
                <option value="1">Missions</option>
                <option value="2">Raid</option>
                <option value="3">Fractal</option>
                <option value="4">PvP</option>
                <option value="5">Fun</option>
            </select>
            <textarea id="activity_content" name="activity[content]" placeholder="{##activity_content_text##}">{##activity_content##}</textarea>
            {##activity_content_validation##}<br />
            Date: <input type="date" name="activity[date]" placeholder="Date" value="{##activity_date##}" />
            Time: <input type="time" name="activity[time]" placeholder="Time" value="{##activity_time##}" /> {##activity_date_validation##}<br />
            <input type="checkbox" {##activity_comments_checked##} name="activity[comments]" value="1" /> Allow comments for this event<br />
        </fieldset>
        {##signups_form##}
        {##class_selection_form##}
        <fieldset>
            <legend>Post itttt!</legend>
            <input type="submit" name="activity[submit]" value="{##submit_text##}" />
            <input type="submit" name="activity[preview]" value="{##preview_text##}" />
        </fieldset>
        {##activity_general_validation##}
    </form>
</section>