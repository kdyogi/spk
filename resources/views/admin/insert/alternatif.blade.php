@extends('../layouts.master')

@section('pwd', 'Insert')

@section('now', 'Kriteria')

@section('menu-insert-alternatif', 'nav-item-expanded nav-item-open')
@section('menu-insert', 'nav-item-expanded nav-item-open')
@section('link-active-insert-alternatif', 'active')

@section('content')
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Form Input Alternatif</h5>
            </div>
            <div class="card-body">
                <form action="/alternatif" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="kriteria" class="col-form-label col-lg-1">Alternatif</label>
                        <div class="col-lg-4">
                            <input type="text" name="nama_alternatif" class="form-control @error('nama_alternatif') is-invalid @enderror" placeholder="masukan nama alternatif">
                            @error('nama_alternatif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Example --}}
        {{-- <div class="card-header">
            <h5 class="card-title">Form Alternatif</h5>
        </div>
        <div class="card-body">
            <form action="/alternatif" method="POST" id="frm">
                @csrf
                <div class="input_fields_wrap">
                    <button class="add_field_button">Add More Fields</button>
                    <div><input type="text" name="mytext[]" id="mytext" class="@error('mytext') is-invalid @enderror"></div>
                    @error('mytext')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="card-footer">
                        <button type="submit" id="btnSimpan" class="btn btn-sm btn-primary">Submit</button>
                        <button type="submit" id="Simpan" class="btn btn-sm btn-primary">SSS</button>
                </div>
            </form>
        </div> --}}
        {{-- End --}}
    </div>

    

    {{-- <script>
        // $(document).ready(function() {
        //     var max_fields      = 5; //maximum input boxes allowed
        //     var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        //     var add_button      = $(".add_field_button"); //Add button ID
            
            // var x = 1; //initlal text box count
            // $(add_button).click(function(e){ //on add input button click
            //     e.preventDefault();
            //     if(x < max_fields){ //max input box allowed
            //         x++; //text box increment
            //         $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            //     }
            // });
            
            // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            //     e.preventDefault(); $(this).parent('div').remove(); x--;
            // })

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // function saveToDB() {
            //     var select = $(this).serialize();
            //     $.ajax({
            //         type: 'POST',
            //         url: '/alternatif',
            //         data: select
            //     }).then(function(data){
            //         alert(data)
            //     });
            // }

            // $("#Simpan").click(function(e) {
            //     var kata = $('input[name="mytext[]"]').map(function(){
            //         if(this.value == "") {
            //             e.preventDefault(); 
            //             $(this).parent('div').remove(); 
            //             x--;
            //         }
            //     }).get();
            // });

            // Sudah
            // $("#Simpan").click(function(e) {
            //     // var kata = $('input[name="mytext[]"]').map(function(){
            //     //     if(this.value == "") {
            //     //         e.preventDefault(); $(this).parent('div').remove(); x--;
            //     //     } else {
            //     //         console.log('sukses');
            //     //     }
            //     // }).get();
                
            // });
        // });
    </script> --}}

@endsection