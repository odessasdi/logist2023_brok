<div>


    @if (session()->has('flash.banner'))
    <div class="alert alert-success">
       <x-banner />
    </div>
@endif 
</div>
