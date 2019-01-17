<?php

use Illuminate\Database\Seeder;

class MagicCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//цвета
		DB::table('color_lst')->insert([
			'color_name' => 'Земля',
			'color_code' => 'land',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Красный',
			'color_code' => 'red',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Бесцветный',
			'color_code' => 'colorless',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Белый',
			'color_code' => 'white',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Синий',
			'color_code' => 'blue',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Зеленый',
			'color_code' => 'green',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Черный',
			'color_code' => 'black',
		]);
		DB::table('color_lst')->insert([
			'color_name' => 'Многоцветный',
			'color_code' => 'multicolor',
		]);
		//языки
		DB::table('lang_lst')->insert([
			'lang_name' => 'Русский',
			'lang_code' => 'ru',
		]);
		DB::table('lang_lst')->insert([
			'lang_name' => 'Английский',
			'lang_code' => 'en',
		]);
		//Состояние
		DB::table('condition_lst')->insert([
			'condition_name' => 'NM',
		]);
		DB::table('condition_lst')->insert([
			'condition_name' => 'SP',
		]);
		//Редкость
		DB::table('rarity_lst')->insert([
			'rarity_name' => 'Common',
			'rarity_code' => 'common',
		]);
		DB::table('rarity_lst')->insert([
			'rarity_name' => 'Mythic Rare',
			'rarity_code' => 'mythic-rare',
		]);
		DB::table('rarity_lst')->insert([
			'rarity_name' => 'Rare',
			'rarity_code' => 'rare',
		]);
		DB::table('rarity_lst')->insert([
			'rarity_name' => 'Uncommon',
			'rarity_code' => 'uncommon',
		]);
		//Сеты
		DB::table('sets_lst')->insert([
			'sets_name' => 'Magic 2011 Core Set',
		]);
		DB::table('sets_lst')->insert([
			'sets_name' => 'Magic 2012 Core Set',
		]);
		DB::table('sets_lst')->insert([
			'sets_name' => 'Magic 2013 Core Set',
		]);
		DB::table('sets_lst')->insert([
			'sets_name' => 'Magic Tenth Edition',
		]);
		DB::table('sets_lst')->insert([
			'sets_name' => 'Modern Masters 2013',
		]);
		DB::table('sets_lst')->insert([
			'sets_name' => 'Shadowmoor',
		]);
		//Карточки
		DB::table('magic_cards')->insert([
			'name' => 'Слуга Живописца (RUS)',
			'type'=> 'Артефактное Существо — Пугало',
			'image'=> '257.jpg',
			'color'=> 3,
			'rarity'=> 3,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 41.7,
			'foil'=> false,
			'sets'=> 6,
			'decription'=> '<p>При входе Слуги Живописца в игру выберите цвет.</p><p>Все карты, которые не находятся в игре, заклинания и перманенты являются объектами выбранного цвета в дополнение к своим другим цветам.</p>',
			'amount'=> 4,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Progenitus (ENG)',
			'type'=> 'Legendary Creature — Hydra Avatar',
			'image'=> '182.jpg',
			'color'=> 8,
			'rarity'=> 2,
			'lang'=> 2,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 20.00,
			'foil'=> false,
			'sets'=> 5,
			'decription'=> '<p>Protection from everything</p><p>If Progenitus would be put into a graveyard from anywhere, reveal Progenitus and shuffle it into its owner\'s library instead.</p>',
			'amount'=> 5,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Первородная гидра (RUS)',
			'type'=> 'Существо — Гидра',
			'image'=> '183.jpg',
			'color'=> 6,
			'rarity'=> 2,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 10.00,
			'foil'=> false,
			'sets'=> 5,
			'decription'=> '<p>Первородная Гидра выходит на поле битвы с Х жетонами +1/+1 на ней.</p><p>В начале вашего шага поддержки удвойте количество жетонов +1/+1 на Первородной Гидре.</p><p>Первородная Гидра имеет Пробивной удар, пока на ней есть не менее десяти жетонов +1/+1.</p>',
			'amount'=> 3,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Noble Hierarch (ENG)',
			'type'=> 'Creature — Human Druid',
			'image'=> '183.jpg',
			'color'=> 6,
			'rarity'=> 3,
			'lang'=> 2,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 100.00,
			'foil'=> false,
			'sets'=> 5,
			'decription'=> '<p><strong>Exalted</strong> (Whenever a creature you control attacks alone, that creature gets +1/+1 until end of turn.)</p><p><strong>{T}: Add {G}, {W}, or {U} to your mana pool.</strong></p>',
			'amount'=> 6,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Тасигур, Золотой Клык (RUS) (FOIL) (PRE)',
			'type'=> 'Легендарное Существо — Человек Шаман',
			'image'=> 'tasigur_tha_golden.jpg',
			'color'=> 7,
			'rarity'=> 2,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 180.00,
			'foil'=> true,
			'sets'=> 5,
			'decription'=> '<p>Выкапывание (Каждая карта, которую вы изгоняете из вашего кладбища при разыгрывании этого заклинания, считается оплатой {1}.)</p><p>{2}{G/U}{G/U}: положите две верхние карты вашей библиотеки на ваше кладбище, затем верните не являющуюся землей карту по выбору оппонента из вашего кладбища в вашу руку.</p>',
			'amount'=> 4,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Мастер Жестокостей (RUS) (FOIL)',
			'type'=> 'Существо — Демон',
			'image'=> '82.jpg',
			'color'=> 8,
			'rarity'=> 3,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 50.00,
			'foil'=> true,
			'sets'=> 4,
			'decription'=> '<p>Первый удар, Смертельное касание. Мастер Жестокостей может атаковать только в одиночку.Каждый раз, когда Мастер Жестокостей атакует игрока и не заблокирован, количество жизней того игрока становится равным 1. Мастер Жестокостей не распределяет боевые повреждения в этом бою.</p>',
			'amount'=> 4,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Изгнанный Повелитель Драконов (RUS) (FOIL) (PRE)',
			'type'=> 'Существо — Демон',
			'image'=> '144.jpg',
			'color'=> 2,
			'rarity'=> 3,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 25.00,
			'foil'=> true,
			'sets'=> 2,
			'decription'=> '<p>В начале вашего шага поддержки, если под вашим контролем есть не менее шести земель, положите на поле битвы одну фишку существа 5/5 красный Дракон с Полетом.</p>',
			'amount'=> 4,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Изгнанный Повелитель Драконов (RUS) (FOIL) (PRE)',
			'type'=> 'Существо — Элементаль',
			'image'=> '174.jpg',
			'color'=> 6,
			'rarity'=> 3,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 10.00,
			'foil'=> true,
			'sets'=> 2,
			'decription'=> '<p>Когда Зеленый Страж Мурасы выходит на поле битвы, вы можете вернуть целевую карту из вашего кладбища в вашу руку.</p><p>Когда Зеленый Страж Мурасы умирает, вы можете изгнать его. Если вы это делаете, верните целевую карту из вашего кладбища в вашу руку.</p>',
			'amount'=> 4,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Field Marshal (ENG)',
			'type'=> 'Creature — Human Soldier',
			'image'=> '15-1.jpg',
			'color'=> 4,
			'rarity'=> 2,
			'lang'=> 2,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 10.00,
			'foil'=> true,
			'sets'=> 4,
			'decription'=> '<p>Other Soldier creatures get +1/+1 and have first strike. (They deal combat damage before creatures without first strike.)</p>',
			'amount'=> 5,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Драна, Освободительница Малакира (RUS)',
			'type'=> 'Легендарное Существо — Вампир Союзник',
			'image'=> '109.jpg',
			'color'=> 7,
			'rarity'=> 3,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 14.00,
			'foil'=> true,
			'sets'=> 4,
			'decription'=> '<p>Полет, Первый ударКаждый раз, когда Драна, Освободительница Малакира наносит боевые повреждения игроку, положите один жетон +1/+1 на каждое атакующее существо под вашим контролем.</p>',
			'amount'=> 5,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Отборные Бойцы Двайнен (RUS) (FOIL)',
			'type'=> 'Существо — Эльф Воин',
			'image'=> '173.jpg',
			'color'=> 6,
			'rarity'=> 4,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 20.00,
			'foil'=> true,
			'sets'=> 4,
			'decription'=> '<p>Когда Отборные Бойцы Двайнен выходят на поле битвы, если вы контролируете другого Эльфа, положите на поле битвы одну фишку существа 1/1 зеленый Эльф Воин.</p>',
			'amount'=> 2,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Гадатель по Внутренностям (RUS) (FOIL)',
			'type'=> 'Существо — Вампир Чародей',
			'image'=> '120.jpg',
			'color'=> 7,
			'rarity'=> 1,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 50.00,
			'foil'=> true,
			'sets'=> 1,
			'decription'=> '<p>Пожертвуйте существо: предскажите 1. (Чтобы предсказать 1, посмотрите верхнюю карту вашей библиотеки, затем вы можете положить ту карту в низ вашей библиотеки.)</p>',
			'amount'=> 3,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Храм Таинств (RUS) (FOIL)',
			'type'=> 'Земля',
			'image'=> '226.jpg',
			'color'=> 1,
			'rarity'=> 2,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 7.00,
			'foil'=> true,
			'sets'=> 1,
			'decription'=> '<p>Храм Таинств выходит на поле битвы повернутым.</p>
			<p>Когда Храм Таинств выходит на поле битвы, предскажите 1. (Посмотрите верхнюю карту вашей библиотеки. Вы можете положить ту карту в низ вашей библиотеки.)</p>
			<p>{T}: добавьте {G} или {U} в ваше хранилище маны.</p>',
			'amount'=> 3,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Вампир - Полуночник (RUS) (FOIL)',
			'type'=> 'Существо — Вампир Шаман',
			'image'=> '112.jpg',
			'color'=> 7,
			'rarity'=> 4,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 12.00,
			'foil'=> true,
			'sets'=> 3,
			'decription'=> '<p>Полет</p>
			<p>Смертельное касание (Любое количество повреждений, которое этот объект наносит существу, достаточно, чтобы его уничтожить.)</p>
			<p>Цепь жизни (Повреждения, наносимые этим существом, также заставляют вас получить такое же количество жизней.)</p>',
			'amount'=> 6,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Затопленная Лощина (RUS) (FOIL) (PRE)',
			'type'=> 'Земля — Остров Болото',
			'image'=> '249.jpg',
			'color'=> 1,
			'rarity'=> 2,
			'lang'=> 1,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 35.00,
			'foil'=> true,
			'sets'=> 3,
			'decription'=> '<p>({T}: добавьте {U} или {B} в ваше хранилище маны.) Затопленная Лощина выходит на поле битвы повернутой, если только под вашим контролем нет двух или более базовых земель.</p>',
			'amount'=> 5,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Gifts Ungiven (ENG)',
			'type'=> 'Instant',
			'image'=> '46.jpg',
			'color'=> 5,
			'rarity'=> 2,
			'lang'=> 2,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 40.00,
			'foil'=> true,
			'sets'=> 3,
			'decription'=> '<p>(Search your library for up to four cards with different names and reveal them. Target opponent chooses two of those cards. Put the chosen cards into your graveyard and the rest into your hand. Then shuffle your library.</p>',
			'amount'=> 2,
		]);
		DB::table('magic_cards')->insert([
			'name' => 'Etched Champion (ENG) (FOIL)',
			'type'=> 'Artifact Creature — Soldier',
			'image'=> '209.jpg',
			'color'=> 3,
			'rarity'=> 2,
			'lang'=> 2,
			'condition'=> 1,
			'in_stock'=> true,
			'price'=> 16.00,
			'foil'=> true,
			'sets'=> 3,
			'decription'=> '<p><strong>Metalcraft</strong> — Etched Champion has protection from all colors as long as you control three or more artifacts.</p>',
			'amount'=> 2,
		]);
    }
}
