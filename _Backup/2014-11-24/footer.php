<div id="hidden" style="position:absolute;top:150px;left:300px;">
	<div id="send_email" style="position:absolute;background:#fff;display:none;margin:0 0 0px 5px;padding:20px;border:1px solid;">
		<ul class="send-email">
			<li>
				<div class="send-email-label">
					<label class="reg-label">Your e-Mail Address</label>
				</div>
				<input id="email_address" name="email" type="text" style="width:333px;height:22px;" />
			</li>
			<li>
				<div class="send-email-label">
					<label class="reg-label">Your Message</label>
				</div>
				<textarea id="email_content" name="content" cols="50" rows="9"></textarea>
			</li>
			<li>
				<div style="clear:both;"></div>
				<img src="images/Submit.png" onclick="email_send()" class="email-button" alt="submit" />
				<img src="images/Cancel.png" onclick="email_close()" class="email-button" alt="cancel" />
				<!--div onclick="email_send()" style="cursor:pointer;">send</div><div onclick="email_close()" style="cursor:pointer;">close</div-->
				<div style="clear:both;"></div>
				<div id="email_errors_div"></div>
			</li>
		</ul>
	</div>
</div>
</div>
<div id="cover"></div>
<footer>
<!--Copyright©2013 <b>Enrich DeLux.</b> All Rights Reserved.-->
</footer>
</body>
</html>