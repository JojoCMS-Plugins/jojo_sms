<div id="error" class="error"{if !$error} style="display: none;"{/if}>{$error}</div>
<div id="message" class="message"{if !$message} style="display: none;"{/if}>{$message}</div>
<div>Your website now includes functionality to send SMS text messages to cellphones. Many people find using a computer keyboard easier than a cellphone keypad.<br />
SMS messages cost {$pricecents}c each and will be charged to your web hosting account periodically. (balance ${$balance|number_format})</div>
<h3>Send SMS</h3>
<form method="post" action="sms/">
<label for="from">From:</label><br />
<input type="text" name="from" id="from" value="{$from}" /><br />
<label for="phone">Phone:</label><br />
<input type="text" name="phone" id="phone" value="{$phone}" /><br />
<label for="message">Message:</label><br />
<textarea name="msg" id="msg" rows="5" cols="40" onkeydown="countDown('msg', 'counter', 160);" onkeyup="countDown('msg','counter', 160); hideregion('message'); hideregion('error');">{$msg}</textarea><br />
Remaining characters: <input readonly="readonly" style="width: 25px;" name="counter" id="counter" size="3" maxlength="3" value="" type="text" /><br />
<input type="submit" name="submit" value="send" /><br />
</form>