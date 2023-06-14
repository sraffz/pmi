<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    <!-- For Web Client View: import Web Meeting SDK CSS -->
	<link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.3.5/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="https://source.zoom.us/2.3.5/css/react-select.css" />
</head>
<body>
    <div class="container-fluid">
        <!-- added on import -->
        <div id="zmmtg-root"></div>
        <div id="aria-notify-area"></div>    
    </div>

    <script src="https://source.zoom.us/2.3.5/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.3.5/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.3.5/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.3.5/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.3.5/lib/vendor/lodash.min.js"></script>
    <!-- For Client View -->
    <script src="https://source.zoom.us/zoom-meeting-2.3.5.min.js"></script>
    <script>

        navigator.permissions.query({name: 'microphone'})
        .then((permissionObj) => {
        console.log(permissionObj.state);
        })
        .catch((error) => {
        console.log('Got error :', error);
        })

        navigator.permissions.query({name: 'camera'})
        .then((permissionObj) => {
        console.log(permissionObj.state);
        })
        .catch((error) => {
        console.log('Got error :', error);
        })

        ZoomMtg.preLoadWasm();
        ZoomMtg.prepareWebSDK();
        // loads language files, also passes any error messages to the ui
        ZoomMtg.i18n.load('en-US');
        ZoomMtg.i18n.reload('en-US');
        // For Global, use source.zoom.us:
        ZoomMtg.setZoomJSLib('https://source.zoom.us/2.3.5/lib', '/av'); 

        ZoomMtg.init({
            leaveUrl: '{{ route('home') }}',
            success: (success) => {
                // console.log(success)
                ZoomMtg.join({
                    signature: '{{ generate_signature_zoom ($program->zoom->meeting_code) }}', // role in signature needs to be 0
                    apiKey: '{{ env("ZOOM_MEETING_API_KEY") }}',
                    meetingNumber: '{{ $program->zoom->meeting_code }}',
                    userName: '{{ auth()->user()->nama_singkatan }}',
                    passWord: '{{ $program->zoom->pass_code }}',
                    success: (success) => {
                        console.log(success)
                    },
                    error: (error) => {
                        console.log(error)
                    }
                })
            },
            error: (error) => {
                console.log(error)
            }
        })

    </script>
</body>
</html>