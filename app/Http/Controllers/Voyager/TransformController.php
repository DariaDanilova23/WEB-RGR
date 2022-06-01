<?php
namespace App\Http\Controllers\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Post;
use App\Models\OldOrder;
use App\Models\Order;
class TransformController extends VoyagerBaseController
{
    public function transport(){
        // Получить запись по ID и переключить статус
        // с PUBLISHED (Опубликовано) на PENDING (Ожидание) и наоборот.
        $order = Order::where('id', \request("id"))->first();
        DB::table('old_orders')->insert(
            array(
                'order_id'     =>   $order->id,
                'user'   =>   $order->user,
                'items'  =>   $order->items,
                'price'  =>   $order->price,
            )
        );
       $order->delete();
        return redirect(route('voyager.orders.index'));
    }
}
