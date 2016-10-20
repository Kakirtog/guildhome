<section class="form">
    <h3>Register a new EoL website account</h3>
    <p>
        Please don't use your GW2 account name as your username if you ever
        plan on having multiple GW2 accounts (like NA/EU).<br />
        It will be possible to link several GW2 accounts to one EoL account.<br />
        Consider using a name people should call you by in-game, because, at least for
        now, activities and such will be posted with your username.<br />
        An E-Mail address is required to reset a lost password automatically.<br />
        The Voucher can be obtained from Evo or Ani, just drop us a line/send us
        a mail in-game :)
    </p>
    <form method="post" action="{##form_action##}">
        <label for="register_username">
            {##register_username_text##}
            <input id="register_username" type="text" size="32" name="register[username]" value="{##register_username##}" placeholder="{##register_username_text##}" />
            {##register_username_validation##}
        </label>
        <label for="register_email">
            {##register_email_text##}
            <input id="register_email" type="text" size="32" name="register[email]" value="{##register_email##}" placeholder="{##register_email_text##}" />
            {##register_email_validation##}
        </label>
        <label for="register_voucher">
            {##register_voucher_text##}
            <input id="register_voucher" type="text" size="16" name="register[voucher]" value="{##register_voucher##}" placeholder="{##register_voucher_text##}" />
            {##register_voucher_validation##}
        </label>
        <label for="register_password_new">
            {##register_password_new_text##}
            <input id="register_password_new" type="password" size="32" name="register[password_new]" placeholder="{##register_password_new_text##}" autocomplete="off" />
            {##register_password_new_validation##}
        </label>
        <label for="register_password_repeat">
            {##register_password_repeat_text##}
            <input id="register_password_repeat" type="password" size="32" name="register[password_repeat]" placeholder="{##register_password_repeat_text##}" autocomplete="off" />
            {##register_password_repeat_validation##}
        </label>
        <input type="submit"  name="register[submit]" value="{##register_submit_text##}" />
        <!-- <input type="reset"  name="register[cancel]" value="{##register_cancel_text##}" /> //-->
        {##register_general_validation##}
    </form>
</section>
