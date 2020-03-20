<?php

use Illuminate\Database\Seeder;
use App\Models\Cate;
use App\Models\News;
use App\Models\User;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	
    	$cate_ids = Cate::all()->pluck("id")->toArray();

        $user_ids = User::all()->pluck("id")->toArray();

    	$pics = [
    		'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
            'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',
    	];

    	// 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        //随机创建50条数据
    	//$news_s = factory(News::class, 50)->create()->each(function ($news) use($faker, $pics) {
	       	//随机赋值分类id
    		//$news->cate_id = $faker->randomElement($cate_id);
    		//随机装入图片
    		//$news->pic     = $faker->randomElement($pics);
	    //});


        $news_s = factory(News::class, 50)
                        ->make()
                        ->each(function ($news, $index)
                            use ($faker, $pics, $cate_ids, $user_ids)
        {
            // 从头像数组中随机取出一个并赋值
            $news->pic = $faker->randomElement($pics);

            $news->cate_id = $faker->randomElement($cate_ids);

            $news->user_id = $faker->randomElement($user_ids);
            
        });

    	News::insert($news_s->toArray());

        
    }
}
