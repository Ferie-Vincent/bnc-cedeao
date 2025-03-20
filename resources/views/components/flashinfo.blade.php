<marquee behavior="scroll" direction="left" scrollamount="5">
@foreach($flashinfos as $flashinfo)

@if($flashinfo['idType'] == 1)
<span class="name-flash">URGENT : </span>
{{ $flashinfo['corpsTexte'] }}


@elseif($flashinfo['idType'] == 2)
<span class="name-flash">INFO : </span>
{{ $flashinfo['corpsTexte'] }}


@elseif($flashinfo['idType'] == 3)
<span class="name-flash">INFO : </span>
{{ $flashinfo['corpsTexte'] }}


@endif
@endforeach
</marquee>