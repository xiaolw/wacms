function wawa_player(options) {
	this.audio = options.audio[0]; //播放器
	this.playInfo = options.playInfo; //播放器信息	
	this.autoPlay = options.autoPlay; //是否自动播放
	this.player = options.player; //播放器按钮
	this.info = options.info; //播放信息
	this.musicList = options.musicList; //播放列表
	this.cur = 0; //当前索引值
	this.cur_info = {}; //存放当前音乐的信息
	this.musicUl = null; //存放当前音乐列表DOM
	this.time = null; //存放时间进度DOM
	this.loadList = false; //加载音乐函数
	this.loop = true; //循环播放
	this.init();
}
$(function() {
	wawa_player.prototype = {
		init: function() {
			var that = this,
				audio = that.audio,
				player = that.player;

			if (player && player.playBtn) {
				
				var playClass = player.playBtn.data("play"),
					pauseClass = player.playBtn.data("pause"),
					stopClass = player.playBtn.data("stop");
				
				player.playBtn.tap(function() { //播放按钮点击事件
					if (audio.duration) {
						audio.paused ? audio.play() : audio.pause();
					} else {
						that.playInfo && that.playInfo.html("暂无歌曲");
					}
					return false;
				});

			}

			if (player && player.prevBtn) {
				player.prevBtn.tap(function() { //播放上一首按钮
					if (audio.duration) {
						that.cur != 0 ? that.play({
							"index": that.cur - 1
						}) : that.playInfo && that.playInfo.html("前面已经没有歌曲了");
					}
					return false;
				});
			}

			if (player && player.nextBtn) { //播放下一首按钮
				player.nextBtn.tap(function() {
					if (audio.duration) {
						that.cur != that.musicList.length - 1 ? that.play({
							"index": that.cur + 1
						}) : that.playInfo && that.playInfo.html("后面已经没有歌曲了");
					}
					return false;
				});
			}

			that.autoPlay && that.play({ //自动部分
				"index": that.cur
			});

			audio.addEventListener('ended', function() { //监听停止
				if(that.musicList){
					if (that.cur == that.musicList.length - 1) {
						if (that.loadList) { //重新加载歌曲
							that.musicList = that.loadList();
							that.cur = 0;
							that.playInfo && that.playInfo.html("重新加载音乐列表");
							that.play({
								"index": that.cur
							});
						} else {
							if (that.loop) { //循环播放列表
								that.cur = 0;
								that.play({
									"index": that.cur
								});
								that.playInfo && that.playInfo.html("重新播放");
								return false;
							} else { //停止播放
								player.playBtn && player.playBtn.removeClass(playClass).removeClass(pauseClass).addClass(stopClass);
								that.playInfo && that.playInfo.html("播放完毕");
								return false;
							}
						}
					} else {
						that.play({
							"index": that.cur + 1
						});
					}					
				}
			}, false);
			
			audio.addEventListener('pause', function() { //监听暂停
				that.playInfo && that.playInfo.html("暂停 : " + that.cur_info.song);
				player.playBtn.removeClass(pauseClass).removeClass(stopClass).addClass(playClass);
				return false;
			}, false);

			audio.addEventListener('play', function() { //监听播放
				that.playInfo && that.playInfo.html("正在播放 : " + that.cur_info.song);
				player.playBtn.removeClass(playClass).removeClass(stopClass).addClass(pauseClass);
				return false;
			}, false);			
			
		},
		play: function(option) {
			var that = this;
			var auto = true;   //默认自动播放
			that.time && that.time.html("");  //清除上一首歌的时间进度
			
			if (option) { //改变配置信息
				option.musicList && (that.musicList = option.musicList);
				option.index != undefined && (that.cur = option.index); 
				option.loop != undefined && (that.loop = option.loop);
				option.loadList != option.loadList && (that.loadList = option.loadList);
				option.auto != undefined && (auto = option.auto);
			}

			if (that.musicUl) {
				that.musicUl.children("li").removeClass(that.musicUl.data("curclass")).eq(that.cur).addClass(that.musicUl.data("curclass"));
			}
			
			if(that.musicList){
				that.cur_info = { //当前音乐的信息
					"id": that.musicList[that.cur].id,
					"song": that.musicList[that.cur].song,
					"songer": that.musicList[that.cur].songer,
					"img": that.musicList[that.cur].img,
					"album": that.musicList[that.cur].album,
					"src": that.musicList[that.cur].src
				}				
			}

			if (that.info) { //播放信息
				that.info.song && that.info.song.html(that.cur_info.song);
				that.info.songer && that.info.songer.html(that.cur_info.songer);
				that.info.album && that.info.songer.html(that.cur_info.album);
				that.info.img && that.info.img.attr("src", that.cur_info.img);
			}

			that.audio.src = that.musicList[that.cur].src; //加载歌曲
			
			that.audio.addEventListener('error', function() { //监听失败
				that.playInfo && that.playInfo.html("请求失败 : " + that.cur_info.song);
				that.cur != that.musicList.length - 1 && that.play({
					"index": that.cur + 1
				});
			}, false);

			auto&&that.audio.play();  // 默认自动播放
		},
		list: function(option) {
			var that = this;
			var ul = option.musicUl;
			that.musicUl = ul;
			$(document).on("tap", "#" + ul.data("id") +'>li', function() { //点击歌曲播放
				that.play({
					"index": $(this).index()
				});
			});
		},
		times: function(option) {
			var that = this,
				   cur = option.curTimeProcess,
				   dur = option.durTimeProcess;

			that.audio.addEventListener('timeupdate', function() {  //监听时间变化
				option.curTime.html(that._timeDispose(that.audio.currentTime));
				option.durTime.html(that._timeDispose(that.audio.duration));
				if(cur && dur){
					cur.css("width",(that.audio.currentTime / that.audio.duration * dur.width()));
				}
			}, false);
			
			if(dur && cur && option.isMove){
				dur.tap(function(e){   //点击时间进度条
					if(that.audio.duration){
						e = e || event;  
						var wdith = e.pageX - dur.offset().left;
						cur.animate({"width": wdith}, "fast");
						that.audio.currentTime = wdith / dur.width() * that.audio.duration;
						return false;
					}
				});
			}
		},
		voice: function(option) {
			var that = this,
				   muteBtn = option.muteBtn,
				   highBtn = option.highBtn,
				   cur = option.curVoiceProcess,
				   dur = option.durVoiceProcess;

			that.audio.volume = 0.5; // 设为一半的音量
			cur && cur.css("width",(dur.width() * 0.5));
			
			highBtn && highBtn.tap(function(){  //最大音量
					that.audio.volume = 1;
					cur.animate({"width": dur.width()}, "fast");
				});
			
			muteBtn && muteBtn.tap(function(){  //静音
				that.audio.volume = 0;
				cur.animate({"width": 0}, "fast");
			});
			
			dur && cur && dur.tap(function(e){  //点击改变音量
					e = e || event;
					var width = ((e.pageX - dur.offset().left) / dur.width()).toFixed(1);
					that.audio.volume = width;
					cur.animate({"width": width * dur.width()}, "fast");
					return false;
			});
					
		},
		_timeDispose: function(number) {  //时间转化
			var minute = parseInt(number / 60);
			var second = parseInt(number % 60);
			minute = minute >= 10 ? minute : "0" + minute;
			second = second >= 10 ? second : "0" + second;
			return isNaN(minute) || isNaN(second) ? "00:00" : (minute + ":" + second);
		}

	};
});