<!DOCTYPE html>
<html lang="en">

<style>
h2 {text-align: center;}
p {text-align: right;}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h2><strong>Project Monitoring</strong></h2>       
                        <a href="{{ route('project.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PROJECT</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">PROJECT NAME</th>
                                <th scope="col">CLIENT</th>
                                <th scope="col">PROJECT LEADER</th>
                                <th scope="col">START DATE</th>
                                <th scope="col">END DATE</th>
                                <th scope="col">PROGRESS</th>
                                <th scope="col">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($projects as $project)
                                <tr>
                                    <!-- <td class="text-center">
                                        <img src="{{ Storage::url('public/projects/').$project->image }}" class="rounded" style="width: 150px">
                                    </td> -->
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>{{ $project->leader }}</td>
                                    <td>{{ $project->start }}</td>
                                    <td>{{ $project->end }}</td>
                                    <td>{{ $project->progress }}</td>
                                    <!-- <td>{!! $project->content !!}</td> -->
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('project.destroy', $project->id) }}" method="POST">
                                            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Project belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $projects->links() }}

                        </br>
                        <p>Created by:</p> 
                        <p><strong>Latief Irfansyah</strong></p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>