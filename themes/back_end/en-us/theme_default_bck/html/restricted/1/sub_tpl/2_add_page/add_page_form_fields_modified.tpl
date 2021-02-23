<form enctype="multipart/form-data" role="form" action="?page_id=2&modified_id={{page_id_frt}}" method="post">
<label for="meta_title">* Title</label>
<input id="meta_title" name="meta_title" maxlength="140" value="{{page_title_frt}}">
<label for="url_title">* URL Title</label>
<input id="url_title" name="url_title" maxlength="140" value="{{page_title_url_frt}}">
<label for="meta_description">Meta Description</label>
<input id="meta_description" name="meta_description" maxlength="75" value="{{page_description_frt}}">
<label for="summary">Summary</label>
<textarea name="summary" rows="7" placeholder="Summary text ...">{{page_summary_frt}}</textarea>
<label for="body">Body</label>
<textarea name="body" rows="20" placeholder="Body text ...">{{page_body_frt}}</textarea>
<fieldset>
<legend>Theme Settings</legend>
<div id="auth_access">
<label for="_auth_access">auth_access</label>
<input id="_auth_access" name="auth_access" maxlength="2" value="{{page_auth_access_frt}}" >
</div>
<div id="lang">
<label for="_lang">Lang</label>
<input id="_lang" name="theme_lang_bck" maxlength="5" value="{{page_theme_lang_frt}}" >
</div>
<div id="folder">
<label for="_folder">Folder</label>
<input id="_folder" name="theme_folder_bck" maxlength="50" value="{{page_theme_folder_frt}}" >
</div>
<div id="tpl">
<label for="_tpl">Tpl</label>
<input id="_tpl" name="theme_tpl_bck" maxlength="50" value="{{page_theme_tpl_frt}}" >
</div>
</fieldset>
<fieldset>
<legend>Page Settings</legend>
<div id ="in_home">
<label for="_in_home">in_home</label>
<select id="_in_home" name="in_home">
{{page_in_home_frt}}
</select>
</div>
<div id="in_nav">
<label for="_in_nav">in_nav</label>
<select id="_in_nav" name="in_nav">
{{page_in_nav_frt}}
</select>
<label for="_in_subnav">in_subnav</label>
<input id="_in_subnav" value="{{page_in_sub_nav_frt}}" name="in_subnav">
</div>
<label for="_in_cache">in_cache</label>
<select id="_in_cache" name="in_cache">
{{page_in_cache_frt}}
</select>
<label for="_cache_duration">Cache Duration</label>
<input id="_cache_duration" value="{{page_duration_cache_time_frt}}" name="cache_duration">
</fieldset>
<input type="hidden" name="page_submitted" value="1">
<hr>
<button type="submit" name="submit" value="Save page" id="submit">Save</button>
</form>
