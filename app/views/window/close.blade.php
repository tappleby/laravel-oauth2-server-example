<script>(function() {
		"use strict";
		var responseMessage={{ $responseMessage }}
			, parentWindow = window.opener || window.parent.window.opener;

		if (parentWindow) {
			parentWindow.postMessage(JSON.stringify(responseMessage), "{{ URL::to('') }}");
		}
		window.close();
	})();</script>