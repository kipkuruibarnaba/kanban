<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;
use App\Models\Card;

class ColumnController extends Controller
{

    public function getColumns()
    {
        $columns =Column::all();
        foreach($columns as $column){
            $column->cardtitle = Card::where('column_id', $column->id)->get();
            $column->carddes =Card::where('column_id', $column->id)->get();
        }
       return $columns;
    }

    public function store(Request $request)
    {
        $columns =Column::all();
       if(!$columns && !empty($columns)){
        $columnlastid = Column::orderBy('created_at', 'desc')->first()->id;
        $Column = new Column;
        $Column->name=$columnlastid+1;
        $Column->Save();
        return response()->json([
            'status'=>200,
            'message'=>'Column Added Successfully'
        ]);   
       } else {
        $Column = new Column;
        $Column->name=1;
        $Column->Save();
        return response()->json([
            'status'=>200,
            'message'=>'Column Added Successfully'
        ]);
       }

    }
public function edit(Request $request){
  $data = $request->all();
  return $data;
}
    public function storecard(Request $request)
    {

        // $cardlastid = Card::orderBy('created_at', 'desc')->first()->id;
        // $Card = new Card;
        // $Card->column_id=$request->columnid;
        // $Card->name=$cardlastid;
        // $Card->description='des';
        // $Card->Save();
        // return response()->json([
        //     'status'=>200,
        //     'message'=>'Card Added Successfully'
        // ]);

        $description = 'The card which is being displayed belongs to column number 6 and is card number .9';
        $cards =Card::all();
        if(!$cards && !empty($cards)){
            $cardlastid = Card::orderBy('created_at', 'desc')->first()->id;
            $Card = new Card;
            $Card->column_id=$request->columnid;
            $Card->name=$cardlastid;
            $Card->description='The card which is being displayed belongs to column number '.$request->columnid.' and is card number '.$cardlastid;
            $Card->Save();
         return response()->json([
             'status'=>200,
             'message'=>'Column Added Successfully'
         ]);   
        } else {
        $Card = new Card;
        $Card->column_id=$request->columnid;
        $Card->name=1;
        $Card->description='The card which is being displayed belongs to column number '.$request->columnid.' and is card number 1';
        $Card->Save();
         return response()->json([
             'status'=>200,
             'message'=>'Column Added Successfully'
         ]);
        }
    }
}
