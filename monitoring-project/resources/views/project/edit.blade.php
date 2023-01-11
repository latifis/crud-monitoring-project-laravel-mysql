<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">PROJECT NAME</label>
                                <input type="text" class="form-control @error('project') is-invalid @enderror" name="project" value="{{ old('project') }}" placeholder="Masukkan Nama Project">
                            
                                <!-- error message untuk project -->
                                @error('project')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CLIENT</label>
                                <input type="text" class="form-control @error('client') is-invalid @enderror" name="client" value="{{ old('client') }}" placeholder="Masukkan Nama Client">
                            
                                <!-- error message untuk client -->
                                @error('client')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PROJECT LEADER</label>
                                <input type="text" class="form-control @error('leader') is-invalid @enderror" name="leader" value="{{ old('leader') }}" placeholder="Masukkan Nama Project Leader">
                            
                                <!-- error message untuk leader -->
                                @error('leader')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">START DATE</label>
                                <input type="text" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" placeholder="Masukkan Start Date">
                            
                                <!-- error message untuk start -->
                                @error('start')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">END DATE</label>
                                <input type="text" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" placeholder="Masukkan End Date">
                            
                                <!-- error message untuk end -->
                                @error('end')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PROGRESS</label>
                                <input type="text" class="form-control @error('progress') is-invalid @enderror" name="progress" value="{{ old('progress') }}" placeholder="Masukkan Progress">
                            
                                <!-- error message untuk progress -->
                                @error('progress')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>