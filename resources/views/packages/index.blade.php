@extends("layouts.base")
@section("title")
    <title>Wally's Widgets :: Index</title>
@endsection

@section("js")
<script>
    const packages = {!! json_encode($packages) !!};
</script>
@endsection

@section("content")

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
              Available Packages
            </div>
            <div class="card-body">
                <Packages></Packages>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
              Add Package
            </div>
            <div class="card-body">
                <AddPackages></AddPackages>
            </div>
        </div>
    </div>
</div>

@endsection