@extends('layouts.app')
@section('title', 'Collection')


@section('content')
<h1>My Collection</h1>
<?php //dd($cardss);

?>

<?php //dd($cardss['0']->name);
//dd($cardss['0']);

$count = count($cardss)-1 ;
/*
for($i=0;$i<=$count;$i++) {
   echo $cardss[$i]->name.'<br>';
   echo $cardss[$i]->rarity.'<br>';
   //var_dump ($cardss[$i]);
}
*/

?>
@for($i=0;$i<=$count;$i++)
<h3>Name of the card: {{$cardss[$i]->name}} </h3>
<p>Rarity: {{$cardss[$i]->rarity}}</p>
<p>Set Name: {{$cardss[$i]->set_name}}</p>




@endfor
@endsection




