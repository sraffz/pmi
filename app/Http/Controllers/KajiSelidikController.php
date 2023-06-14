<?php

namespace App\Http\Controllers;

use App\Charts\KajiSelidikChart;
use App\Models\PenilaianPenceramah;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class KajiSelidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function _construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $senaraiKajiSelidik = Program::with('senaraiKajiSelidikPengguna')->get(); 

        $data = [
            'senaraiKajiSelidik'=> $senaraiKajiSelidik,
        ];  
       
    
        return view('kaji-selidik.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();

        return view('kaji-selidik.create', $data);
    }

    public function graph($id)
    {
        $program = Program::find($id);

        $penceramahProgram = $program->senaraiPenceramah;

        $penilaianPenceramah = collect([]);
        foreach ($penceramahProgram as $index => $penceramah ) {

            $data1 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan1', 1)->count();
            $data2 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan1', 2)->count();
            $data3 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan1', 3)->count();
            $data4 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan1', 4)->count();
            $data5 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan1', 5)->count();
            
            $soalan1 = [$data1,$data2,$data3,$data4,$data5];

            $data1 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan2', 1)->count();
            $data2 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan2', 2)->count();
            $data3 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan2', 3)->count();
            $data4 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan2', 4)->count();
            $data5 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan2', 5)->count();
            
            $soalan2 = [$data1,$data2,$data3,$data4,$data5];

            $data1 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan3', 1)->count();
            $data2 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan3', 2)->count();
            $data3 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan3', 3)->count();
            $data4 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan3', 4)->count();
            $data5 = PenilaianPenceramah::where('id_program', $id)->where('id_penceramah', $penceramah->id_penceramah)->where('soalan3', 5)->count();
            
            $soalan3 = [$data1,$data2,$data3,$data4,$data5];

            $penilaianPenceramah->push([
                'nama_penceramah' => $penceramah->nama_penceramah,
                'soalan1' => $soalan1,
                'soalan2' => $soalan2,
                'soalan3' => $soalan3,
                'chart1' => new KajiSelidikChart,
                'chart2' => new KajiSelidikChart,
                'chart3' => new KajiSelidikChart,
            ]);
            
        }

        foreach ($penilaianPenceramah as $penilaian) {

            $penilaian['chart1']->labels(['1', '2', '3', '4', '5']);
            $penilaian['chart1']->dataset('', 'bar', $penilaian['soalan1'])->options([
                'color' => '#ff0000',
                'backgroundColor' => [
                    '#FF6666',
                    '#FF3333',
                    '#FF0000',
                    '#CC0000',
                    '#990000',
                ],
            ]);
            $penilaian['chart1']->title('Pengetahuan Tentang Subjek');
            $penilaian['chart1']->displayAxes(true);

            $penilaian['chart2']->labels(['1', '2', '3', '4', '5']);
            $penilaian['chart2']->dataset('', 'bar', $penilaian['soalan2'])->options([
                'color' => '#ff0000',
                'backgroundColor' => [
                    '#3333FF',
                    '#0000FF',
                    '#0000CC',
                    '#000099',
                    '#000066',
                ],
            ]);
            $penilaian['chart2']->title('Penjelasan Fakta Fakta dan Contoh');
            $penilaian['chart2']->displayAxes(true);

            $penilaian['chart3']->labels(['1', '2', '3', '4', '5']);
            $penilaian['chart3']->dataset('', 'bar', $penilaian['soalan3'])->options([
                'color' => '#ff0000',
                'backgroundColor' => [
                    '#33FF33',
                    '#00FF00',
                    '#00CC00',
                    '#009900',
                    '#006600',
                ],
            ]);
            $penilaian['chart3']->title('Gaya dan Persembahan');
            $penilaian['chart3']->displayAxes(true);

        }

        // dd($penilaianPenceramah);

        $dataBhgA1_1 = $program->kajiselidik()->where('penilaian_keseluruhan', 1)->count();
        $dataBhgA1_2 = $program->kajiselidik()->where('penilaian_keseluruhan', 2)->count();
        $dataBhgA1_3 = $program->kajiselidik()->where('penilaian_keseluruhan', 3)->count();
        $dataBhgA1_4 = $program->kajiselidik()->where('penilaian_keseluruhan', 4)->count();
        $dataBhgA1_5 = $program->kajiselidik()->where('penilaian_keseluruhan', 5)->count();

        $bahagianA1 = new KajiSelidikChart;
        $bahagianA1->labels(['1', '2', '3', '4', '5']);
        $bahagianA1->dataset('', 'pie', [$dataBhgA1_1, $dataBhgA1_2 , $dataBhgA1_3, $dataBhgA1_4, $dataBhgA1_5])->options([
            'color' => '#ff0000',
            'backgroundColor' => [
                '#FF6666',
                '#FF3333',
                '#FF0000',
                '#CC0000',
                '#990000',
            ],
        ]);
        $bahagianA1->title('BAHAGIAN A: Penilaian Keseluruhan Kursus');
        $bahagianA1->displayAxes(false);

        
        $dataBhgB1_1 = $program->kajiselidik()->where('penilaian_kemudahan', 1)->count();
        $dataBhgB1_2 = $program->kajiselidik()->where('penilaian_kemudahan', 2)->count();
        $dataBhgB1_3 = $program->kajiselidik()->where('penilaian_kemudahan', 3)->count();
        $dataBhgB1_4 = $program->kajiselidik()->where('penilaian_kemudahan', 4)->count();
        $dataBhgB1_5 = $program->kajiselidik()->where('penilaian_kemudahan', 5)->count();

        $bahagianB1 = new KajiSelidikChart;
        $bahagianB1->labels(['1', '2', '3', '4', '5']);
        $bahagianB1->dataset('', 'pie', [$dataBhgB1_1, $dataBhgB1_2 , $dataBhgB1_3, $dataBhgB1_4, $dataBhgB1_5])->options([
            'color' => '#ff0000',
            'backgroundColor' => [
                '#3333FF',
                '#0000FF',
                '#0000CC',
                '#000099',
                '#000066',
            ],
        ]);
        $bahagianB1->title('BAHAGIAN B: Penilaian Kemudahan Kursus');
        $bahagianB1->displayAxes(false);
        
        $dataBhgC1_1 = $program->kajiselidik()->where('penilaian_kemudahan', 1)->count();
        $dataBhgC1_2 = $program->kajiselidik()->where('penilaian_kemudahan', 2)->count();
        $dataBhgC1_3 = $program->kajiselidik()->where('penilaian_kemudahan', 3)->count();
        $dataBhgC1_4 = $program->kajiselidik()->where('penilaian_kemudahan', 4)->count();
        $dataBhgC1_5 = $program->kajiselidik()->where('penilaian_kemudahan', 5)->count();

        $bahagianC1 = new KajiSelidikChart;
        $bahagianC1->labels(['1', '2', '3', '4', '5']);
        $bahagianC1->dataset('', 'pie', [$dataBhgC1_1, $dataBhgC1_2 , $dataBhgC1_3, $dataBhgC1_4, $dataBhgC1_5])->options([
            'color' => '#ff0000',
            'backgroundColor' => [
                '#33FF33',
                '#00FF00',
                '#00CC00',
                '#009900',
                '#006600',
            ],
        ]);
        $bahagianC1->title('BAHAGIAN C: Penilaian Bahan Kursus');
        $bahagianC1->displayAxes(false);


        


        $data = [
            'program' => $program,
            'bahagianA1' => $bahagianA1,
            'bahagianB1' => $bahagianB1,
            'bahagianC1' => $bahagianC1,
            'penilaianPenceramah' => $penilaianPenceramah,
        ];

        return view('kaji-selidik.graph', $data);
    }


}
