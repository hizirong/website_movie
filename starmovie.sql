-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-11 07:56:43
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `starmovie`
--
DROP DATABASE IF EXISTS `starmovie`;
CREATE DATABASE IF NOT EXISTS `starmovie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `starmovie`;

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `user_id` varchar(15) NOT NULL,
  `movie_id` int(15) NOT NULL,
  `score` int(1) NOT NULL,
  `message` varchar(50) NOT NULL,
  `c_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`user_id`, `movie_id`, `score`, `message`, `c_time`) VALUES
('021', 1, 3, '普普', '2020-12-28 21:32:48'),
('24', 1, 5, 'goooooood', '2020-12-28 21:36:21'),
('24', 3, 5, '超好看!', '2020-12-28 22:22:25'),
('24', 5, 5, '推推推', '2020-12-28 22:49:27'),
('24', 14, 5, '哭爆', '2020-12-28 22:52:35'),
('28', 1, 5, '讚啦', '2020-12-28 16:59:57'),
('28', 2, 5, '讚讚讚', '2020-12-28 17:00:52');

-- --------------------------------------------------------

--
-- 資料表結構 `following`
--

CREATE TABLE `following` (
  `user_id` varchar(15) NOT NULL,
  `movie_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `following`
--

INSERT INTO `following` (`user_id`, `movie_id`) VALUES
('0', 27),
('021', 2),
('24', 3),
('24', 4),
('24', 5),
('24', 14),
('28', 1),
('28', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(15) NOT NULL,
  `movie_name` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `runtime` int(3) NOT NULL,
  `director` varchar(20) NOT NULL,
  `actors` varchar(20) DEFAULT NULL,
  `release_date` date NOT NULL,
  `country` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `type`, `rating`, `runtime`, `director`, `actors`, `release_date`, `country`, `photo`, `intro`) VALUES
(1, '腿', '劇情', '輔12級(PG12)', 115, '張耀升', '桂綸鎂, 張少懷,楊祐䌀', '2020-12-24', '台灣', 'aleg.jpg', '本屆⾦⾺影展開幕電影！錢\r\n鈺盈的丈夫鄭⼦漢在腿部截肢⼿術後不幸離世，錢鈺盈想拿\r\n回丈夫被截肢的腿，卻被醫院百般刁難、互踢⽪球，於是⼀\r\n場異想天開的「奪腿計畫」就此展開... \r\n'),
(2, '東京教⽗：4K數位修復版', '卡通動畫', '保護級(P)', 91, '今敏', NULL, '2020-12-24', '⽇本', 'tokyo.jpg', '在⼤雪紛⾶的東京聖誕夜，流浪漢阿銀、阿花與美\r\n由紀卻在新宿街頭意外撿到⼀個被遺棄的女嬰。阿銀堅持要\r\n將女嬰送交警察局，但前媽媽桑阿花卻⼀直渴望有個⼩孩，\r\n執意留下女嬰直到找到她的親⽣⽗⺟為⽌...'),
(3, '真愛鄰距離', '⽂藝愛情', '保護級(P)', 135, '約翰派屈克尚利', '傑米道南,愛\r\n蜜莉布朗', '2020-12-24', '美國', 'truelove.jpg', '家族⽣根於愛爾\r\n蘭的蘿絲瑪麗決⼼要擄獲鄰居安東尼的芳⼼。然⽽，安東尼\r\n似乎是遺傳到他們家族的某種魔咒，完全沒有注意到這位美\r\n麗的仰慕者。於此同時……'),
(4, '⽣為女⼈', '劇情', '保護級(P)', 116, '慕雲珠', '伊凡彼得斯,蒂達柯漢哈維', '2020-12-24', '美國', 'woman.jpg', '1966年，海倫瑞蒂帶著三歲女\r\n兒離開澳洲，來到美國⼀圓歌⼿夢。在這裡，她遇⾒了未來\r\n的丈夫兼經紀⼈，以及⼀同奮⾾的女記者，世界似乎為她敞\r\n開⼤⾨。然⽽保守的⽗權社會讓女⼈窒礙難⾏...'),
(5, '愛是您，愛是我', '喜劇', '保護級(P)', 110, '李察·寇蒂斯', '艾瑪湯普遜,比爾奈伊, 柯\r\n林佛斯,連', '2020-12-24', '美國', 'love.jpg', '聖誕倒數中，⼤夥都開⼼迎接佳節到來，但他們的⽣活卻⼀點都不平靜。新上任的英國⾸相，發現⾃⼰愛上了美麗助理；失戀的作家前往南法療傷，卻在湖畔再度相信愛情...'),
(6, '85年的夏天', '⽂藝愛情', '輔12級(PG12)', 101, '馮斯瓦·歐容', '菲利克斯勒費弗\r\n爾,班傑明瓦贊', '2020-12-18', '美國', '85.jpg', '1985年，少年艾雷\r\n在⼀次翻船意外中結識了出⼿相救的⼤衛。⼀個稚嫩羞怯、⼀個熱情⼤膽，性格迥異的兩⼈意外擦出愛的火花....'),
(7, '總是有個⼈在愛你', '劇情', '保護級(P)', 95, '法蘭科・洛利', '卡洛琳娜薩林', '2020-12-18', '美國', 'litigante.jpg', '該片拍攝靈感源於他與⺟親的⼀趟冰島之旅：就在出發前，他的⺟親被診斷罹癌，使他整趟旅⾏提⼼吊膽，深恐⺟親即將不久⼈世，於是將這段⼼境寫成劇本...'),
(8, '⾼校棋蹟', '劇情', '輔12級(PG12)', 110, '約翰·李古查摩', '瑞秋⾙瓊斯,麥可K\r\n威廉斯', '2020-12-18', '美國', 'criticalthinking.jpg', '★ ⾼校版《后翼棄兵》⾒證⼩棋⼠的封王之路！改編⾃1998年邁阿密傑克遜⾼中⻄洋棋隊的真䋿故事，老師⾺利歐帶領⼀群來⾃貧⺠區的少年，教導棋盤上的知識也挖掘孩⼦的潛能... '),
(9, '神⼒女超⼈1984', '動作', '保護級(P)', 150, '派蒂·珍⾦斯', '克莉絲汀薇格,蓋兒加朵,克⾥斯潘恩', '2020-12-17', '美國', 'wonderwoman.jpg', '時間快轉到了1980年代，神⼒女超⼈在她的下⼀個銀幕⼤冒險中，發現⾃⼰⾯對了兩個全新的敵⼈:麥斯威爾洛德和豹女... '),
(10, '求婚好意外', '喜劇', '普遍級(G)', 101, '可莉·杜瓦', '麥坎⻄黛維斯,克莉絲汀史都華', '2020-12-11', '美國', 'happies.jpg', '艾比原本打算趁聖誕假期在家族聚餐上向女友哈珀求婚，沒想到哈珀壓根還沒跟保守的家⼈出櫃。關係曝光讓原本歡樂的假期陷入⼀團混亂，這對戀⼈該如何⾯對⾃⼰和親友勇敢說愛？同時⼜不毀掉完美的聖誕假期？'),
(11, '⼈性爆走課', '劇情', '輔12級(PG12)', 78, '陳清輝', '陳安科', '2020-12-11', '越南', 'rm.jpg', '描述非法地下彩券醜陋⽣態的越南電影《⼈性爆走課》..'),
(12, '愛在⽇落巴黎時', '⽂藝愛情', '保護級(P)', 80, '李察·林克雷特', '伊森霍克,茱莉蝶兒', '2020-12-04', '美國', 'sunset.jpg', '以男女主⾓不斷對話做為電影的軸⼼，並與現䋿中的時間並⾏，呈現最真䋿的感情樣貌，多年來仍是許多影迷⼼中無可取代的愛情經典... '),
(13, '魔物獵⼈', '動作', '保護級(P)', 103, '保羅·威廉·史考特·安德森', '蜜拉喬娃維琪', '2020-12-04', '美國', 'monster.jpg', '本片根據CAPCOM熱⾨電玩遊戲改編，劇情描述在⼈類居住的世界背後，有個充滿危險強⼤的魔物世界...'),
(14, '刻在你⼼底的名字', '劇情', '保護級(P)', 113, '柳廣輝', '曾敬驊,邵奕玫,陳昊森', '2020-12-04', '台灣', 'name.jpg', '電影聚焦在80年代剛解嚴的台灣，⼀對遊走在友誼，愛慕之間的⾼中同窗，他們在青春的騷動與性啟蒙的渴望牽引下冒險... '),
(15, '尋找⼩魔女Doremi', '卡通動畫', '普遍級(G)', 92, '佐藤順⼀', '森川葵,松井玲奈', '2020-11-27', '⽇本', 'doremi.jpg', '等待⼆⼗年…魔法再次降臨！\r\n年齡、個性和居住地都不同的三名女性，都陷入對⼈⽣迷惘\r\n的階段，看不清未來，這時，引領她們相遇的竟是「⼩魔女\r\nDoReMi」...'),
(16, '鬼故事收藏館', '恐怖', '限制級', 108, '萊恩斯賓德爾', '克藍西布朗,雅格艾洛迪', '2021-03-05', '美國', '鬼故事蒐藏館.jpg', '首創四個死亡事故串起一段神祕結局，曲折又恐怖！一名年輕女子到太平間參加葬禮，充滿好奇心的她，想應徵太平間當助手，在一個神祕的房間裡遇到一位高大又有點恐怖的館長師。這名館長帶著年輕女子參觀他的收藏品，並且還告訴她四個瘋狂、奇異又讓人無法忘記的死亡故事。每段電影情節充滿了驚奇、病態以及推理。然而四段故事情節卻串起了一段不可思議的神秘結局。'),
(17, '無名弒', '動作', '輔導級', 101, '伊利亞·維克托羅維奇·奈舒勒', '康妮尼爾森,鮑勃奧登科克', '2021-02-26', '美國', '無名弒.jpg', '當有一晚兩名劫匪闖入哈奇的家中，他不願意以暴力保護他的家人，只希望能避免家人受到傷害。他的兒子對他感到失望，妻子對他漸行漸遠。發生這次事之後，哈奇內心隱忍已久的怒火被燃起，也觸發了他沉睡已久的直覺反應，促使他走上一條暴力血腥的道路，他深藏不露很久的陰暗祕密和各種致命殺人能力也再度浮現出來。經過一連串的激烈打鬥、槍戰和飛車追逐之後，哈奇為了拯救他的家人，必須不擇手段消滅一名危險的對手，並且確定他往後再也不會被當成一個被低估的無名氏。'),
(18, '想見你的愛', '劇情', '保護級', 123, '三木孝浩', '吉高由里子,橫濱流星,町田啓太', '2021-01-22', '日本', '想見你的愛.jpg', '日本首週新片票房冠軍！所有女性觀眾一致爆哭好評推薦！因犯罪放棄拳擊生涯的壘在停車場打工維生，意外結識失明女孩明香里，因意外失去雙親與視力的她，用開朗點亮了壘沉寂已久的生活。被悲劇折磨的兩人墜入愛河並開始同居，壘也積極重返拳擊擂台，為兩人的未來努力奮鬥。此時過去的組織老大找上門，用明香里的安全威脅他參加地下拳擊賭博。為了讓明香里重見光明，壘決定站上地下擂台打最後一場拳......'),
(19, '劇場版 超人力霸王大河－新世代終結黑暗', '卡通動畫', '普遍級', 147, '市野龍一', '諒太郎,新山千春,吉永亞由里', '2021-01-22', '日本', '超人力霸王大河.jpg', '睽違十年再度在台灣上映《劇場版超人力霸王》★ 殘酷父子大戰：大河vs.父親太郎！民間警備組織《E.G.I.S.》工作的工藤優幸，與超人力霸王們歷經眾多戰鬥後，更加深彼此間的羈絆。然而，有不明人士盯上了優幸。新世代超人力霸王們光、翔、大地、凱、陸、活海、勇海得知這件事後，為了拯救優幸紛紛來到地球。但是，太郎居然攻擊了自己的兒子大河。大河有辦法跟自己的父親戰鬥嗎？'),
(20, '約定的夢幻島', '驚悚', '輔導級', 108, '神戶守', '北川景子,濱邊美波 ', '2021-01-20', '日本', '約定的夢幻島.jpg', '轟動全球的日本漫畫神作《約定的夢幻島》！宛如天堂般的孤兒院「恩典農場孤兒院」，所有孤兒在被稱為「媽媽」的教育員伊莎貝拉(北川景子飾)細心照料下，過著錦衣玉食的夢幻生活，直到「被領養」才能跨出孤兒院的柵欄與大門。某日，孤兒院裡最年長的小孩艾瑪、諾曼與雷發現了恐怖的真相－原來他們都是提供給「鬼」的食用兒童！因此他們下定決心要帶領大家逃出這個地獄...'),
(21, '好好拍電影', '紀錄片', '普遍級', 118, '文念中', '許鞍華 ', '2021-01-15', '台灣', '好好拍電影.jpg', '在2020年金馬影展拿下單場觀眾票選第第一的《好好拍電影》是金馬獎最佳美術指導得主文念中首次執導，從2016年初在許鞍華導演拍攝《明月幾時有》開始，鉅細彌遺地記錄了三年來許導演的片場裡與片場外的點點滴滴，足堪為所有愛電影的觀眾、電影人絕對不能錯過的年度電影！'),
(22, '死亡醫生的遺產-BLACK FILE', '懸疑、驚悚', '輔導級', 130, '深川榮洋', '綾野剛、北川景子、岡田健史', '2021-01-15', '日本', '死亡醫生的遺產.jpg', '這名醫生是救世主，還是獵奇殺人犯？「賜你一個毫無痛苦的死亡」接受某個地下網站委託，幫人施行安樂死的連續殺人犯「死亡醫生」。此人物之存在被發現的契機來自一名少年控訴著父親被殺死的報案電話。警視廳搜查一課的No.1搭檔犬養跟高千穗立刻著手辦案，相似的案件也接連浮上檯面。然而受害者家屬卻口徑一致地擁護犯人。死亡醫生究竟是獵奇殺人犯？還是救贖之神？驚愕的事實與更巨大的悲劇即將降臨在犬養與高千穗身上。'),
(23, '妄想代理人：後篇', '卡通動畫', '保護級', 147, '今敏', '能登麻美子、桃井晴子、飯塚昭三', '2021-01-08', '日本', '妄想代理人.jpg', '日本最膾炙人口的深夜成人動畫，今敏最具野心代表作！個性內向的鷺月子憑藉人氣玩偶瑪洛米成為炙手可熱的設計師，與此同時她也遭遇來自同行的妒嫉以及下一次創作的瓶頸。在一次夜歸途中，月子受傷住院，她聲稱遭到一名手持彎曲金屬球棍、腳穿金色溜冰鞋的少年襲擊。在此之後，“球棒少年”的襲擊案件不斷發生，警官豬狩和馬庭介入調查，發現受害者在遇襲前大都承受著巨大的壓力。不久，“球棒少年”落網，看似一切終於要告一段落，然而整個事態卻朝著更加糟糕的方向發展...'),
(24, '迷失安狄', '劇情', '保護級', 108, '陳立謙', '林心如,李李仁 ', '2021-01-08', '台灣', '迷失安狄.jpg', '「在這世界上，每個人都值得愛與被愛」安狄在結婚生子後，才發現自己的內心渴望成為女人，他在妻子離世後決定勇敢面對自己，卻換來家人的不諒解，事業、家庭落得兩頭空，還失去最要好的朋友，讓他墜入無止盡的深淵。一次偶然中安狄結識了沒有居留證的蘇荷母子，激發起他的同情心收留對方，卻意外了改變他的未來...。一個迷惘於身分證上的性別欄，只希望填入真正的自己，另一個居留定所備受欺凌，在這座冷漠疏離的城市，上天能點起一盞溫暖的燈，照亮這群孤單的人嗎？'),
(25, '破處那件小事', '劇情', '保護級', 97, '喬伊克勞福德', '海克瑪卡琪, 提爾史威格', '2021-01-08', '德國', '破處那件小事.jpg', '28年華的史黛菲早已立定人生志向：成為警察；也期待著巴黎畢業旅行，她還計畫要與男友一起完成那件神聖的事「破處」，沒想到在畢旅前的健康檢查，史黛菲被檢測出患有小細胞支氣管癌末期，醫師評估她最多只能撐到年底，一家人面臨這震驚的診斷都感到無比悲傷，史黛菲為了不讓人生留下缺憾，她決定把握還活著的時間屢行與法比的巴黎之約。但史黛菲的父母出於保護企圖阻止她遠行，面對不可預知的生命歷程，這一場或許要以生命為代價換取的旅程，終將為她帶來什麼樣的改變呢？'),
(26, '聖誕殺戮日', '驚悚', '保護級', 98, '波多野貴文', '佐藤浩市,西島秀俊,廣瀨愛麗絲,石田百合', '2021-01-08', '日本', '聖誕殺戮日.jpg', '平安夜裡，電視台接到一通匿名電話，聲稱在東京市區的惠比壽安置即將引爆的炸彈，一名前往現場報導的記者和一名正在購物的家庭主婦被當成了頭號嫌疑犯。接著又一則犯罪宣言在網路曝光，發布者表示下一個目標是東京平安夜最熱鬧的中心。首相任命警察世田及新人警察泉調查犯人行蹤。逐漸逼近犯案預告的時間點，慶祝聖誕的群眾開始聚集廣場，東京1400萬人命懸一線。究竟是誰在幕後主使這場恐怖行動？他的目的又是什麼？這個聖誕節，將沒有人逃得過命運的安排...'),
(27, '靈魂急轉彎', '卡通動畫', '普遍級', 106, '彼特·達克特', '傑米福克斯', '2020-12-25', '美國', '靈魂急轉彎.jpg', '皮克斯年度原創動畫！故事想探討一個非常抽像的話題- 人的靈魂! 因為在我們來到這個世界前，都會在一個「關於你研討會」參加培訓，在這裡，靈魂會被賦予特徵、興趣和能力、以及基本的性格屬性，正是這一切，造就了你的樣子。一但準備就緒，你的靈魂就畢業，隨後降臨到這個世界，開啟有意義的一生。但在故事主角喬加德的身上，卻出了差錯，一系列的陰錯陽差，喬來到了自己的「關於你的研討會」，他想盡辦法要回到真實世界，這場特別的旅程，讓喬重新審視人生的意義...'),
(28, '拆彈專家2', '劇情', '輔導級', 120, '邱禮濤', '劉青雲,劉德華', '2020-12-31', '香港', '拆彈專家2.jpg', '兩大影帝劉德華、劉青雲再次合作！前拆彈專家潘乘風被發現昏迷在爆炸案的案發現場，被香港警方列為頭號嫌疑犯，甦醒後的潘乘風記憶缺損，只能一邊逃亡，一邊告殘存記憶的蛛絲馬跡來查明真相。他的好友董卓文和他的前女友龐玲對他講述了一段和他記憶截然不同的狀況，讓案情更加難解。而有計劃的爆炸案仍然接二連三發生，真相卻越來越撲朔迷離。'),
(29, '杏林醫院', '恐怖', '輔導級', 100, '朱家麟', '朱芷瑩,太保,林柏宏', '2020-12-31', '台灣', '杏林醫院.jpg', '實地取材 全台網友票選鬼屋第一名！鬼門已開，凌晨零點零分時，台灣最大鬧鬼醫院-杏林醫院裡，出現多位準備尋親之人。 由台南最負盛名的法師帶隊，曉玲與妙如，她們各懷目的，義無反顧踏入醫院，曾經在這發生的過往，逐漸湧上眼前。 不料，醫院陰氣太重，壓的眾人喘不過氣；無法投胎的怨魂糾纏，生死危在旦夕...');

-- --------------------------------------------------------

--
-- 資料表結構 `theater`
--

CREATE TABLE `theater` (
  `t_id` int(5) NOT NULL,
  `t_name` varchar(10) NOT NULL,
  `t_tel` varchar(10) NOT NULL,
  `t_addr` varchar(50) NOT NULL,
  `t_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `theater`
--

INSERT INTO `theater` (`t_id`, `t_name`, `t_tel`, `t_addr`, `t_pic`) VALUES
(1, '國賓影城', '02-2226-80', '新北市中和區中山路三段122號4樓', '/theater/01.png'),
(2, '東南亞秀泰', '02-2367-89', '台北市中正區羅斯福路４段136巷3號', '/theater/02.jpg'),
(3, '百老匯', '02-8663-61', '台北市文山區羅斯福路四段200號', '/theater/03.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `timetable`
--

CREATE TABLE `timetable` (
  `time_id` int(5) NOT NULL,
  `movie_id` int(15) NOT NULL,
  `auditorium` varchar(10) NOT NULL,
  `t_time` varchar(20) NOT NULL,
  `theater_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `timetable`
--

INSERT INTO `timetable` (`time_id`, `movie_id`, `auditorium`, `t_time`, `theater_id`) VALUES
(1, 1, '4', '11:00,15:00,21:00', 1),
(2, 1, 'C', '15:40,19:40', 2),
(3, 1, '春風', '15:20,19:20', 3),
(4, 2, '2', '11:00,15:00', 1),
(5, 2, 'B', '15:00', 2),
(6, 2, 'C', '19:00', 2),
(7, 2, '百花', '13:00,17:00', 3),
(8, 3, '4', '10:00,18:00,22:00', 1),
(9, 3, 'C', '11:00,13:00', 2),
(10, 3, '春風', '13:00,21:00', 3),
(11, 4, '1', '14:00,17:00', 1),
(12, 4, 'B', '10:00,14:00', 2),
(13, 4, '鳥語', '13:00', 3),
(14, 5, '3', '10:00,12:00', 1),
(15, 5, 'B', '17:00', 2),
(16, 6, '1', '10:30', 1),
(17, 6, 'B', '19:00', 2),
(18, 6, '百花', '10:00', 3),
(19, 7, '4', '09:00', 1),
(20, 8, '2', '17:00', 1),
(21, 9, '3', '13:00', 1),
(22, 9, '2', '13:30', 1),
(23, 9, 'B', '12:00', 2),
(24, 9, 'C', '12:30', 2),
(25, 10, '鳥語', '14:30', 3),
(26, 11, '鳥語', '16:00', 3),
(27, 12, '4', '13:00', 1),
(28, 13, 'A', '15:00', 2),
(29, 14, '3', '15:00', 1),
(30, 15, 'A', '13:00', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `user_name` text NOT NULL,
  `pw` varchar(15) NOT NULL,
  `level` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `pw`, `level`) VALUES
('0', 'administer', '00', 1),
('021', 'belinda', '021', 0),
('24', 'Ray', '24', 0),
('28', 'zirong', '28', 0),
('TEST', 'test', 'TT', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- 資料表索引 `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- 資料表索引 `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`t_id`);

--
-- 資料表索引 `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theater_id` (`theater_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `timetable`
--
ALTER TABLE `timetable`
  MODIFY `time_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- 資料表的限制式 `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- 資料表的限制式 `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`theater_id`) REFERENCES `theater` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;