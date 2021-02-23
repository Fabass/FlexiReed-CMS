<form enctype="multipart/form-data" role="form" action="?page_id=5" method="post">
<label for="user-login">* Login</label>
<input id="user-login" name="user_login_bck" maxlength="140" value="{{user_login_bck}}">
<label for="full-name">Full name</label>
<input id="full-name" name="user_name_bck" maxlength="75" value="{{user_name_bck}}">
<label for="user-mail">E-mail</label>
<input id="user-mail" name="user_email_bck" value="{{user_email_bck}}">
<label for="new-password">* Password</label>
<input type="password" id="new-password" name="user_password_bck" maxlength="140" value="">
<label for="confirm-password">* Confirm password</label>
<input type="password" id="confirm-password" name="user_confirm_password_bck" maxlength="75" value=""> 
<fieldset>
<legend>Theme Settings</legend>
<label for="folder">Folder</label>
<input id="folder" value="{{user_theme_folder_bck}}" name="user_theme_folder_bck">
<label for="access">Access</label>
<input id="access" value="{{user_level_access_bck}}" name="user_level_access_bck">
<label for="user-lang">Lang</label>
<select id="user-lang" name="user_theme_lang_bck">{{user_theme_lang_bck}}</select>
<label for="user-timezone">Timezone</label>
<select id="user-timezone" name="user_timezone_bck">{{user_timezone_bck}}</select>
</fieldset>
<input type="hidden" name="page_submitted" value="1">
<hr>
<button type="submit" name="submit" value="Save page" id="submit">Save</button>                                        
</form>