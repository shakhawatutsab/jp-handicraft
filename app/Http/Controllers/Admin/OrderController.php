namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        // ডাটাবেজ থেকে সব অর্ডার ক্রমানুসারে এবং সাথে সাথে Pagination নিয়ে আসবে
        $orders = Order::latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
}
