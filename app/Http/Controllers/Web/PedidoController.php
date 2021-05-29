<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Traits\ConsultaApiTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    use ConsultaApiTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return view('layouts.pedidos.pantalla');
    }

    public function get_pedidos(Request $request){
        $data = new \stdClass();
        $data->data = null;
        $url = env('API_URL');
        try{
            $client = new Client();
//            if (!session()->has('access_token')) {
//                $token_response = $this->obtener_access_token()['access_token'];
//                session(['access_token' => $token_response]);
//            }

            $headers = [
                'Accept'  => 'application/json',
//                'Authorization' => 'Bearer '.session()->get('access_token')
            ];

            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'verify'  => false,
            ]);

            if ($response->getStatusCode() == 204) {
                return response('', 204, []);
            }
            $data = json_decode($response->getBody()->getContents(), true);

        } catch(ClientException $e){
            $data = array();
        } catch (Exception $e) {
            $data = array();
        }

        //return view('layouts.pedidos.pedidos_items', ['data'=>$data])->render();
        return view('layouts.pedidos.pedidos_items', ['data'=>$this->mock()])->render();
    }

    private function mock(){
        return [
            [
                "ClienteNombre" => "ELVIO CONTRERAS",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:53:46",
                "NroPedido" => "19",
                "PedidosEstado" => "L",
                "Producto" => [
                    [
                        "Agregado" => [
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip"=> "EXTRA QUESO"
                            ]
                        ],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA PEÑERA",
                        "ProductoNota" => ""
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "SIN CAMBIOS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL LEÑADOR",
                        "ProductoNota" => "SIN MAYO"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "Local"
            ],
            [
                "ClienteNombre" => "GISSELE GAUTO",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:54:01",
                "NroPedido" => "20",
                "PedidosEstado" => "L",
                "Producto" => [
                    [
                        "Agregado" => [
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA QUESO"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "PEPINILLOS"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA QUESO"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "PEPINILLOS"
                            ]
                        ],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL FORASTERO",
                        "ProductoNota" => "SIN AROS"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA PEÑERA",
                        "ProductoNota" => ""
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "SIN CAMBIOS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL LEÑADOR",
                        "ProductoNota" => "SIN MAYO"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "Pedidos"
            ],
            [
                "ClienteNombre" => "JUAN PEREZ",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:54:11",
                "NroPedido" => "21",
                "PedidosEstado" => "P",
                "Producto" => [
                    [
                        "Agregado" => [
                        ],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "Local"
            ],
            [
                "ClienteNombre" => "OSCAR GONZALEZ",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:54:23",
                "NroPedido" => "22",
                "PedidosEstado" => "L",
                "Producto" => [
                    [
                        "Agregado" => [
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA QUESO"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "PEPINILLOS"
                            ]
                        ],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL FORASTERO",
                        "ProductoNota" => "SIN AROS"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA PEÑERA",
                        "ProductoNota" => ""
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "SIN CAMBIOS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL LEÑADOR",
                        "ProductoNota" => "SIN MAYO"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "Pedidos"
            ],
            [
                "ClienteNombre" => "CESAR PIMIENTA",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:55:09",
                "NroPedido" => "23",
                "PedidosEstado" => "P",
                "Producto" => [
                    [
                        "Agregado" => [
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA QUESO"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "PEPINILLOS"
                            ]
                        ],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL FORASTERO",
                        "ProductoNota" => "SIN AROS"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA PEÑERA",
                        "ProductoNota" => ""
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "SIN CAMBIOS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL LEÑADOR",
                        "ProductoNota" => "SIN MAYO"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "pick"
            ],
            [
                "ClienteNombre" => "CESAR PIMIENTA",
                "FechaPedido" => "2021-03-11",
                "HoraPedido" => "0001-01-01T17:55:09",
                "NroPedido" => "23",
                "PedidosEstado" => "P",
                "Producto" => [
                    [
                        "Agregado" => [
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA BACON"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "EXTRA QUESO"
                            ],
                            [
                                "AgregadoCant" => 1,
                                "AgregadoDescrip" => "PEPINILLOS"
                            ]
                        ],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL FORASTERO",
                        "ProductoNota" => "SIN AROS"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "PAPAS RUSTICAS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA PEÑERA",
                        "ProductoNota" => ""
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "SIN CAMBIOS",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "EL LEÑADOR",
                        "ProductoNota" => "SIN MAYO"
                    ],
                    [
                        "Agregado" => [],
                        "CambioDescrip" => "AROS DE CEBOLLA",
                        "ProductoCant" => 1,
                        "ProductoDescrip" => "LA VIEJA CONFIABLE",
                        "ProductoNota" => ""
                    ]
                ],
                "TipoPedido" => "pick"
            ]
        ];
    }
}
