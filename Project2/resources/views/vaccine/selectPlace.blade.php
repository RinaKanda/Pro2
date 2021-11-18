<!-- 会場選択 -->
<body>
    <table class="table text-center">
                <tr>
                    <th class="text-center">ID</th> -->
                </tr> 
                    <td>{{ $clinics }}</td>
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{ $clinic->clinic_id }}</td>

                </tr>
            @endforeach
             
                                
<a href="/selectDay">送信</a>
</body>