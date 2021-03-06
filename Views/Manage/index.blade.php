<!doctype html>
<html>
<head>
@include('hstcms::manage.common.head')
</head>
<body>
<div class="manage-content">
<form class="hstui-form hstui-form-horizontal J_ajaxForm" action="{{ route('manageFtpSave') }}" method="post">
  {!! hst_csrf() !!} 
  <div class="hstui-frame">
    <div class="hstui-frame-title">FTP{{ hst_lang('hstcms::public.configure') }}</div>
    <div class="hstui-frame-content">
      <div class="hstui-form-group hstui-form-group-sm @if($errors->has('host')) hstui-form-error @endif" id="J_form_error_host">
        <label for="doc-ipt-3-1" class="hstui-u-sm-2 hstui-form-label">{{ hst_lang('hstcms::public.host') }}IP</label>
        <div class="hstui-u-sm-10">
          <div class="hstui-u-sm-4">
            <input type="text" name="host" id="hstcms_host" value="{{ hst_value('host', $config) }}" class="hstui-length-5">
          </div>
          <div class="hstui-form-input-tips" id="J_form_tips_host"></div>
        </div>
      </div>
      <div class="hstui-form-group hstui-form-group-sm @if($errors->has('port')) hstui-form-error @endif" id="J_form_error_port">
        <label for="doc-ipt-3-1" class="hstui-u-sm-2 hstui-form-label">{{ hst_lang('hstcms::public.port') }}</label>
        <div class="hstui-u-sm-10">
          <div class="hstui-u-sm-4">
            <input type="text" name="port" id="hstcms_port" value="{{ hst_value('port', $config) }}" class="hstui-length-5">
          </div>
          <div class="hstui-form-input-tips" id="J_form_tips_port"></div>
        </div>
      </div>
      <div class="hstui-form-group hstui-form-group-sm @if($errors->has('username')) hstui-form-error @endif" id="J_form_error_username">
        <label for="doc-ipt-3-1" class="hstui-u-sm-2 hstui-form-label">{{ hst_lang('hstcms::public.username') }}</label>
        <div class="hstui-u-sm-10">
          <div class="hstui-u-sm-4">
            <input type="text" name="username" id="hstcms_username" value="{{ hst_value('username', $config) }}" class="hstui-length-5">
          </div>
            <div class="hstui-form-input-tips" id="J_form_tips_username"></div>
        </div>
      </div>
      <div class="hstui-form-group hstui-form-group-sm @if($errors->has('password')) hstui-form-error @endif" id="J_form_error_password">
        <label for="doc-ipt-3-1" class="hstui-u-sm-2 hstui-form-label">{{ hst_lang('hstcms::public.password') }}</label>
        <div class="hstui-u-sm-10">
          <div class="hstui-u-sm-4">
            <input type="text" name="password" id="hstcms_password" value="{{ hst_value('password', $config) }}" class="hstui-length-5">
          </div>
            <div class="hstui-form-input-tips" id="J_form_tips_password"></div>
        </div>
      </div>
      <div class="hstui-form-group">
        <div class="hstui-u-sm-10 hstui-u-sm-offset-2">
          <button type="submit" class="hstui-button hstui-button-default J_ajax_submit_btn">{{ hst_lang('hstcms::public.submit') }}</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<script>
Hstui.use('jquery','common',function() {
});
</script>
</body>
</html>