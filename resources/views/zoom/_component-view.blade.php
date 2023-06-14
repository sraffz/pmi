@extends('adminlte::page')

@section('css')
    
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>
    <div class="box-body">
        <div class="container-fluid">
            <div id="meetingSDKElement">
                <!-- Zoom Meeting SDK Rendered Here -->
             </div>
        </div>
    </div>
    <div class="box-footer">

    </div>
    
</div>
@endsection

@section('js')
    <!-- For either view: import Web Meeting SDK JS dependencies -->
	<script src="https://source.zoom.us/2.0.1/lib/vendor/react.min.js"></script>
	<script src="https://source.zoom.us/2.0.1/lib/vendor/react-dom.min.js"></script>
	<script src="https://source.zoom.us/2.0.1/lib/vendor/redux.min.js"></script>
	<script src="https://source.zoom.us/2.0.1/lib/vendor/redux-thunk.min.js"></script>
	<script src="https://source.zoom.us/2.0.1/lib/vendor/lodash.min.js"></script>
    
	<!-- For Component View -->
    <script src="https://source.zoom.us/2.0.1/zoom-meeting-embedded-2.0.1.min.js"></script>

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
        
        const client = ZoomMtgEmbedded.createClient();

        let meetingSDKElement = document.getElementById('meetingSDKElement');

        client.init({
            debug: true,
            zoomAppRoot: meetingSDKElement,
            language: 'en-US',
            customize: {
                meetingInfo: ['topic', 'host', 'mn', 'pwd', 'telPwd', 'invite', 'participant', 'dc', 'enctype'],
                toolbar: {
                buttons: [
                    {
                    text: 'Custom Button',
                    className: 'CustomButton',
                    onClick: () => {
                        console.log('custom button');
                    }
                    }
                ]
                }
            }
        });
        
        client.join({
            apiKey: 'eP4kTauZRhKR5GQXGEW3uw',
            signature: '{{ generate_signature_zoom ('86151187640') }}', // role in signature needs to be 0
            meetingNumber: '86151187640',
            password: '187149',
            userName: '{{ auth()->user()->nama_singkatan }}'
        })
    </script>
@endsection