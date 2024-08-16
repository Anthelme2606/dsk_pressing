<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Deposit;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Client::all(); //Get all clients

        // $deliveries = Delivery::all(); //Get all clients

        $nbre_customer = count($customers);

        $users = User::all();

        $nbre_user = count($users);

        $deposits = DB::table('deposits')
             ->where('status', '=', 1)
             ->get();

        $deliveries = DB::table('deposits')
            ->where('status', '=', 0)
            ->get();

        $nbre_deposit = count($deposits);

        $nbre_retrait = count($deliveries);
        $nb_retraits_0_30j=0;
        $nb_retraits_31_89j=0;
        $nb_retraits_90j_plus=0;
        $myDate = Carbon::now();
        foreach($deposits as $deposit){
            if($deposit->retrieve_date != null){
                if(Carbon::parse($deposit->retrieve_date)->diffInDays($myDate)>0 && Carbon::parse($deposit->retrieve_date)->diffInDays($myDate)<30){
                    $nb_retraits_0_30j++;
                } else if(Carbon::parse($deposit->retrieve_date)->diffInDays($myDate)>30 && Carbon::parse($deposit->retrieve_date)->diffInDays($myDate)<90){
                    $nb_retraits_31_89j++;
                } else if(Carbon::parse($deposit->retrieve_date)->diffInDays($myDate)>=90){
                    $nb_retraits_90j_plus++;
                }
            }

        }

        // // Récupérer le nombre de dépôts prêts à être retirés depuis 90 jours ou plus
        // $nb_retraits_90j_plus = Deposit::whereDate('retrieve_date', '<=', $date_retrait->subDays(90))->count();

        // // Récupérer le nombre de dépôts prêts à être retirés depuis 31 à 89 jours
        // $nb_retraits_31_89j = Deposit::whereDate('retrieve_date', '>', $date_retrait->addDays(31))
        //                             ->whereDate('retrieve_date', '<=', $date_retrait->addDays(59))
        //                             ->count();

        // // Récupérer le nombre de dépôts prêts à être retirés entre 0 et 30 jours
        // $nb_retraits_0_30j = Deposit::whereDate('retrieve_date', '>', $date_retrait->addDays(30))
        //                     ->whereDate('retrieve_date', '<=', $date_retrait->addDays(30))
        //                     ->count();


        return view('dashboard',compact('customers', 'nbre_customer', 'nbre_deposit', 'nbre_retrait', 'nbre_user', 'nb_retraits_90j_plus', 'nb_retraits_31_89j', 'nb_retraits_0_30j'));
    }

    public function getCustomer()
    {
        $customers = Client::all(); //Get all clients

        return view('customer', compact('customers'));
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('clients')
         ->orWhere('fullname', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phone_number', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();

      }
      /* else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->limit(10)
         ->get();

         $data = [];


      } */
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->fullname.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->phone_number.'</td>
         <td>'.$row->address.'</td>
         <td><a href="'.route('create_deposit', $row->id).'" class="btn btn-success btn-xs"><i class="fa fa-cart-arrow-down"></i> Nouveau Dépôt</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output .= '
       <tr>
        <td align="center" colspan="5">Pas de Client trouvé</td>
        <td><a href="'.route('clients.create').'" class="btn btn-success btn-xs"><i class="fa fa-smile-o"></i> Ajouter Client </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function actionClientGroup(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('clients')
         ->orWhere('fullname', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phone_number', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();

      }
      /* else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->limit(10)
         ->get();

         $data = [];


      } */
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->fullname.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->phone_number.'</td>
         <td>'.$row->address.'</td>
         <td><a href="'.route('clientgroups.add', $row->id).'" class="btn btn-success btn-xs"><i class="fa fa-cart-arrow-down"></i> Fidéliser ce client</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output .= '
       <tr>
        <td align="center" colspan="5">Pas de Client trouvé</td>
        <td><a href="'.route('clients.create').'" class="btn btn-success btn-xs"><i class="fa fa-smile-o"></i> Ajouter Client </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
