<h1>{{ var }}</h1>
<p>{{ var }}</p>

@if ({{boolean}})
<p>
    {{var}}
</p>
@endif

@ifwithelse ({{boolean}})
<p>
    {{var}}
</p>
@else
<p>{{var}}from else</p>
@endifelse

@foreach ({{elem}} as {{arr}})
<p>{{elem.var1}}</p>
<h2>{{elem.var2}}</h2>
@endforeach