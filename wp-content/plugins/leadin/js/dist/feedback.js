window.wp=window.wp||{},window.wp.feedback=function(t){var e={};function n(r){if(e[r])return e[r].exports;var a=e[r]={i:r,l:!1,exports:{}};return t[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)n.d(r,a,function(e){return t[e]}.bind(null,a));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=50)}({1:function(t,e,n){"use strict";n.d(e,"a",function(){return a}),n.d(e,"b",function(){return i}),n.d(e,"c",function(){return o}),n.d(e,"d",function(){return s}),n.d(e,"e",function(){return l}),n.d(e,"f",function(){return c}),n.d(e,"g",function(){return m}),n.d(e,"h",function(){return u}),n.d(e,"k",function(){return f}),n.d(e,"i",function(){return h}),n.d(e,"l",function(){return p}),n.d(e,"j",function(){return d}),n.d(e,"n",function(){return g}),n.d(e,"o",function(){return v}),n.d(e,"m",function(){return _});var r=window.leadinConfig,a=r.adminUrl,i=r.ajaxUrl,o=r.env,s=r.formsScript,l=r.formsScriptPayload,c=r.hubspotBaseUrl,u=r.leadinPluginVersion,f=r.pluginPath,h=r.nonce,p=r.plugins,d=r.phpVersion,g=r.portalId,v=(r.theme,r.wpVersion),_=r.portalDomain,m=window.leadinI18n},11:function(t,e,n){(function(e){var n="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{};function r(t){return void 0===t}function a(t){return"[object String]"===Object.prototype.toString.call(t)}function i(){try{return new ErrorEvent(""),!0}catch(t){return!1}}function o(t,e){var n,a;if(r(t.length))for(n in t)s(t,n)&&e.call(null,n,t[n]);else if(a=t.length)for(n=0;n<a;n++)e.call(null,n,t[n])}function s(t,e){return Object.prototype.hasOwnProperty.call(t,e)}function l(t){var e,n,r,i,o,s=[];if(!t||!t.tagName)return"";if(s.push(t.tagName.toLowerCase()),t.id&&s.push("#"+t.id),(e=t.className)&&a(e))for(n=e.split(/\s+/),o=0;o<n.length;o++)s.push("."+n[o]);var l=["type","name","title","alt"];for(o=0;o<l.length;o++)r=l[o],(i=t.getAttribute(r))&&s.push("["+r+'="'+i+'"]');return s.join("")}function c(t,e){return!!(!!t^!!e)}function u(t,e){if(c(t,e))return!1;var n,r,a=t.frames,i=e.frames;if(a.length!==i.length)return!1;for(var o=0;o<a.length;o++)if(n=a[o],r=i[o],n.filename!==r.filename||n.lineno!==r.lineno||n.colno!==r.colno||n.function!==r.function)return!1;return!0}t.exports={isObject:function(t){return"object"==typeof t&&null!==t},isError:function(t){switch({}.toString.call(t)){case"[object Error]":case"[object Exception]":case"[object DOMException]":return!0;default:return t instanceof Error}},isErrorEvent:function(t){return i()&&"[object ErrorEvent]"==={}.toString.call(t)},isUndefined:r,isFunction:function(t){return"function"==typeof t},isString:a,isEmptyObject:function(t){for(var e in t)return!1;return!0},supportsErrorEvent:i,wrappedCallback:function(t){return function(e,n){var r=t(e)||e;return n&&n(r)||r}},each:o,objectMerge:function(t,e){return e?(o(e,function(e,n){t[e]=n}),t):t},truncate:function(t,e){return!e||t.length<=e?t:t.substr(0,e)+"…"},objectFrozen:function(t){return!!Object.isFrozen&&Object.isFrozen(t)},hasKey:s,joinRegExp:function(t){for(var e,n=[],r=0,i=t.length;r<i;r++)a(e=t[r])?n.push(e.replace(/([.*+?^=!:${}()|\[\]\/\\])/g,"\\$1")):e&&e.source&&n.push(e.source);return new RegExp(n.join("|"),"i")},urlencode:function(t){var e=[];return o(t,function(t,n){e.push(encodeURIComponent(t)+"="+encodeURIComponent(n))}),e.join("&")},uuid4:function(){var t=n.crypto||n.msCrypto;if(!r(t)&&t.getRandomValues){var e=new Uint16Array(8);t.getRandomValues(e),e[3]=4095&e[3]|16384,e[4]=16383&e[4]|32768;var a=function(t){for(var e=t.toString(16);e.length<4;)e="0"+e;return e};return a(e[0])+a(e[1])+a(e[2])+a(e[3])+a(e[4])+a(e[5])+a(e[6])+a(e[7])}return"xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx".replace(/[xy]/g,function(t){var e=16*Math.random()|0;return("x"===t?e:3&e|8).toString(16)})},htmlTreeAsString:function(t){for(var e,n=[],r=0,a=0,i=" > ".length;t&&r++<5&&!("html"===(e=l(t))||r>1&&a+n.length*i+e.length>=80);)n.push(e),a+=e.length,t=t.parentNode;return n.reverse().join(" > ")},htmlElementAsString:l,isSameException:function(t,e){return!c(t,e)&&(t=t.values[0],e=e.values[0],t.type===e.type&&t.value===e.value&&u(t.stacktrace,e.stacktrace))},isSameStacktrace:u,parseUrl:function(t){var e=t.match(/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?$/);if(!e)return{};var n=e[6]||"",r=e[8]||"";return{protocol:e[2],host:e[4],path:e[5],relative:e[5]+n+r}},fill:function(t,e,n,r){var a=t[e];t[e]=n(a),r&&r.push([t,e,a])}}}).call(this,n(9))},14:function(t,e,n){(function(e){var r=n(15),a=n(16),i=n(17),o=n(11),s=o.isError,l=o.isObject,c=(l=o.isObject,o.isErrorEvent),u=o.isUndefined,f=o.isFunction,h=o.isString,p=o.isEmptyObject,d=o.each,g=o.objectMerge,v=o.truncate,_=o.objectFrozen,m=o.hasKey,b=o.joinRegExp,y=o.urlencode,k=o.uuid4,x=o.htmlTreeAsString,w=o.isSameException,E=o.isSameStacktrace,S=o.parseUrl,C=o.fill,O=n(18).wrapMethod,T="source protocol user pass host port path".split(" "),j=/^(?:(\w+):)?\/\/(?:(\w+)(:\w+)?@)?([\w\.-]+)(?::(\d+))?(\/.*)/;function R(){return+new Date}var B="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{},I=B.document,D=B.navigator;function U(t,e){return f(e)?function(n){return e(n,t)}:e}function P(){for(var t in this._hasJSON=!("object"!=typeof JSON||!JSON.stringify),this._hasDocument=!u(I),this._hasNavigator=!u(D),this._lastCapturedException=null,this._lastData=null,this._lastEventId=null,this._globalServer=null,this._globalKey=null,this._globalProject=null,this._globalContext={},this._globalOptions={logger:"javascript",ignoreErrors:[],ignoreUrls:[],whitelistUrls:[],includePaths:[],collectWindowErrors:!0,maxMessageLength:0,maxUrlLength:250,stackTraceLimit:50,autoBreadcrumbs:!0,instrument:!0,sampleRate:1},this._ignoreOnError=0,this._isRavenInstalled=!1,this._originalErrorStackTraceLimit=Error.stackTraceLimit,this._originalConsole=B.console||{},this._originalConsoleMethods={},this._plugins=[],this._startTime=R(),this._wrappedBuiltIns=[],this._breadcrumbs=[],this._lastCapturedEvent=null,this._keypressTimeout,this._location=B.location,this._lastHref=this._location&&this._location.href,this._resetBackoff(),this._originalConsole)this._originalConsoleMethods[t]=this._originalConsole[t]}P.prototype={VERSION:"3.19.1",debug:!1,TraceKit:r,config:function(t,e){var n=this;if(n._globalServer)return this._logDebug("error","Error: Raven has already been configured"),n;if(!t)return n;var a=n._globalOptions;e&&d(e,function(t,e){"tags"===t||"extra"===t||"user"===t?n._globalContext[t]=e:a[t]=e}),n.setDSN(t),a.ignoreErrors.push(/^Script error\.?$/),a.ignoreErrors.push(/^Javascript error: Script error\.? on line 0$/),a.ignoreErrors=b(a.ignoreErrors),a.ignoreUrls=!!a.ignoreUrls.length&&b(a.ignoreUrls),a.whitelistUrls=!!a.whitelistUrls.length&&b(a.whitelistUrls),a.includePaths=b(a.includePaths),a.maxBreadcrumbs=Math.max(0,Math.min(a.maxBreadcrumbs||100,100));var i={xhr:!0,console:!0,dom:!0,location:!0},o=a.autoBreadcrumbs;"[object Object]"==={}.toString.call(o)?o=g(i,o):!1!==o&&(o=i),a.autoBreadcrumbs=o;var s={tryCatch:!0},l=a.instrument;return"[object Object]"==={}.toString.call(l)?l=g(s,l):!1!==l&&(l=s),a.instrument=l,r.collectWindowErrors=!!a.collectWindowErrors,n},install:function(){var t=this;return t.isSetup()&&!t._isRavenInstalled&&(r.report.subscribe(function(){t._handleOnErrorStackInfo.apply(t,arguments)}),t._globalOptions.instrument&&t._globalOptions.instrument.tryCatch&&t._instrumentTryCatch(),t._globalOptions.autoBreadcrumbs&&t._instrumentBreadcrumbs(),t._drainPlugins(),t._isRavenInstalled=!0),Error.stackTraceLimit=t._globalOptions.stackTraceLimit,this},setDSN:function(t){var e=this._parseDSN(t),n=e.path.lastIndexOf("/"),r=e.path.substr(1,n);this._dsn=t,this._globalKey=e.user,this._globalSecret=e.pass&&e.pass.substr(1),this._globalProject=e.path.substr(n+1),this._globalServer=this._getGlobalServer(e),this._globalEndpoint=this._globalServer+"/"+r+"api/"+this._globalProject+"/store/",this._resetBackoff()},context:function(t,e,n){return f(t)&&(n=e||[],e=t,t=void 0),this.wrap(t,e).apply(this,n)},wrap:function(t,e,n){var r=this;if(u(e)&&!f(t))return t;if(f(t)&&(e=t,t=void 0),!f(e))return e;try{if(e.__raven__)return e;if(e.__raven_wrapper__)return e.__raven_wrapper__}catch(t){return e}function a(){var a=[],i=arguments.length,o=!t||t&&!1!==t.deep;for(n&&f(n)&&n.apply(this,arguments);i--;)a[i]=o?r.wrap(t,arguments[i]):arguments[i];try{return e.apply(this,a)}catch(e){throw r._ignoreNextOnError(),r.captureException(e,t),e}}for(var i in e)m(e,i)&&(a[i]=e[i]);return a.prototype=e.prototype,e.__raven_wrapper__=a,a.__raven__=!0,a.__inner__=e,a},uninstall:function(){return r.report.uninstall(),this._restoreBuiltIns(),Error.stackTraceLimit=this._originalErrorStackTraceLimit,this._isRavenInstalled=!1,this},captureException:function(t,e){var n=!s(t),a=!c(t),i=c(t)&&!t.error;if(n&&a||i)return this.captureMessage(t,g({trimHeadFrames:1,stacktrace:!0},e));c(t)&&(t=t.error),this._lastCapturedException=t;try{var o=r.computeStackTrace(t);this._handleStackInfo(o,e)}catch(e){if(t!==e)throw e}return this},captureMessage:function(t,e){if(!this._globalOptions.ignoreErrors.test||!this._globalOptions.ignoreErrors.test(t)){var n,a=g({message:t+""},e=e||{});try{throw new Error(t)}catch(t){n=t}n.name=null;var i=r.computeStackTrace(n),o=i.stack[1],s=o&&o.url||"";if((!this._globalOptions.ignoreUrls.test||!this._globalOptions.ignoreUrls.test(s))&&(!this._globalOptions.whitelistUrls.test||this._globalOptions.whitelistUrls.test(s))){if(this._globalOptions.stacktrace||e&&e.stacktrace){e=g({fingerprint:t,trimHeadFrames:(e.trimHeadFrames||0)+1},e);var l=this._prepareFrames(i,e);a.stacktrace={frames:l.reverse()}}return this._send(a),this}}},captureBreadcrumb:function(t){var e=g({timestamp:R()/1e3},t);if(f(this._globalOptions.breadcrumbCallback)){var n=this._globalOptions.breadcrumbCallback(e);if(l(n)&&!p(n))e=n;else if(!1===n)return this}return this._breadcrumbs.push(e),this._breadcrumbs.length>this._globalOptions.maxBreadcrumbs&&this._breadcrumbs.shift(),this},addPlugin:function(t){var e=[].slice.call(arguments,1);return this._plugins.push([t,e]),this._isRavenInstalled&&this._drainPlugins(),this},setUserContext:function(t){return this._globalContext.user=t,this},setExtraContext:function(t){return this._mergeContext("extra",t),this},setTagsContext:function(t){return this._mergeContext("tags",t),this},clearContext:function(){return this._globalContext={},this},getContext:function(){return JSON.parse(a(this._globalContext))},setEnvironment:function(t){return this._globalOptions.environment=t,this},setRelease:function(t){return this._globalOptions.release=t,this},setDataCallback:function(t){var e=this._globalOptions.dataCallback;return this._globalOptions.dataCallback=U(e,t),this},setBreadcrumbCallback:function(t){var e=this._globalOptions.breadcrumbCallback;return this._globalOptions.breadcrumbCallback=U(e,t),this},setShouldSendCallback:function(t){var e=this._globalOptions.shouldSendCallback;return this._globalOptions.shouldSendCallback=U(e,t),this},setTransport:function(t){return this._globalOptions.transport=t,this},lastException:function(){return this._lastCapturedException},lastEventId:function(){return this._lastEventId},isSetup:function(){return!!this._hasJSON&&(!!this._globalServer||(this.ravenNotConfiguredError||(this.ravenNotConfiguredError=!0,this._logDebug("error","Error: Raven has not been configured.")),!1))},afterLoad:function(){var t=B.RavenConfig;t&&this.config(t.dsn,t.config).install()},showReportDialog:function(t){if(I){var e=(t=t||{}).eventId||this.lastEventId();if(!e)throw new i("Missing eventId");var n=t.dsn||this._dsn;if(!n)throw new i("Missing DSN");var r=encodeURIComponent,a="";a+="?eventId="+r(e),a+="&dsn="+r(n);var o=t.user||this._globalContext.user;o&&(o.name&&(a+="&name="+r(o.name)),o.email&&(a+="&email="+r(o.email)));var s=this._getGlobalServer(this._parseDSN(n)),l=I.createElement("script");l.async=!0,l.src=s+"/api/embed/error-page/"+a,(I.head||I.body).appendChild(l)}},_ignoreNextOnError:function(){var t=this;this._ignoreOnError+=1,setTimeout(function(){t._ignoreOnError-=1})},_triggerEvent:function(t,e){var n,r;if(this._hasDocument){for(r in e=e||{},t="raven"+t.substr(0,1).toUpperCase()+t.substr(1),I.createEvent?(n=I.createEvent("HTMLEvents")).initEvent(t,!0,!0):(n=I.createEventObject()).eventType=t,e)m(e,r)&&(n[r]=e[r]);if(I.createEvent)I.dispatchEvent(n);else try{I.fireEvent("on"+n.eventType.toLowerCase(),n)}catch(t){}}},_breadcrumbEventHandler:function(t){var e=this;return function(n){if(e._keypressTimeout=null,e._lastCapturedEvent!==n){var r;e._lastCapturedEvent=n;try{r=x(n.target)}catch(t){r="<unknown>"}e.captureBreadcrumb({category:"ui."+t,message:r})}}},_keypressEventHandler:function(){var t=this;return function(e){var n;try{n=e.target}catch(t){return}var r=n&&n.tagName;if(r&&("INPUT"===r||"TEXTAREA"===r||n.isContentEditable)){var a=t._keypressTimeout;a||t._breadcrumbEventHandler("input")(e),clearTimeout(a),t._keypressTimeout=setTimeout(function(){t._keypressTimeout=null},1e3)}}},_captureUrlChange:function(t,e){var n=S(this._location.href),r=S(e),a=S(t);this._lastHref=e,n.protocol===r.protocol&&n.host===r.host&&(e=r.relative),n.protocol===a.protocol&&n.host===a.host&&(t=a.relative),this.captureBreadcrumb({category:"navigation",data:{to:e,from:t}})},_instrumentTryCatch:function(){var t=this,e=t._wrappedBuiltIns;function n(e){return function(n,r){for(var a=new Array(arguments.length),i=0;i<a.length;++i)a[i]=arguments[i];var o=a[0];return f(o)&&(a[0]=t.wrap(o)),e.apply?e.apply(this,a):e(a[0],a[1])}}var r=this._globalOptions.autoBreadcrumbs;function a(n){var a=B[n]&&B[n].prototype;a&&a.hasOwnProperty&&a.hasOwnProperty("addEventListener")&&(C(a,"addEventListener",function(e){return function(a,i,o,s){try{i&&i.handleEvent&&(i.handleEvent=t.wrap(i.handleEvent))}catch(t){}var l,c,u;return r&&r.dom&&("EventTarget"===n||"Node"===n)&&(c=t._breadcrumbEventHandler("click"),u=t._keypressEventHandler(),l=function(t){if(t){var e;try{e=t.type}catch(t){return}return"click"===e?c(t):"keypress"===e?u(t):void 0}}),e.call(this,a,t.wrap(i,void 0,l),o,s)}},e),C(a,"removeEventListener",function(t){return function(e,n,r,a){try{n=n&&(n.__raven_wrapper__?n.__raven_wrapper__:n)}catch(t){}return t.call(this,e,n,r,a)}},e))}C(B,"setTimeout",n,e),C(B,"setInterval",n,e),B.requestAnimationFrame&&C(B,"requestAnimationFrame",function(e){return function(n){return e(t.wrap(n))}},e);for(var i=["EventTarget","Window","Node","ApplicationCache","AudioTrackList","ChannelMergerNode","CryptoOperation","EventSource","FileReader","HTMLUnknownElement","IDBDatabase","IDBRequest","IDBTransaction","KeyOperation","MediaController","MessagePort","ModalWindow","Notification","SVGElementInstance","Screen","TextTrack","TextTrackCue","TextTrackList","WebSocket","WebSocketWorker","Worker","XMLHttpRequest","XMLHttpRequestEventTarget","XMLHttpRequestUpload"],o=0;o<i.length;o++)a(i[o])},_instrumentBreadcrumbs:function(){var t=this,e=this._globalOptions.autoBreadcrumbs,n=t._wrappedBuiltIns;function r(e,n){e in n&&f(n[e])&&C(n,e,function(e){return t.wrap(e)})}if(e.xhr&&"XMLHttpRequest"in B){var a=XMLHttpRequest.prototype;C(a,"open",function(e){return function(n,r){return h(r)&&-1===r.indexOf(t._globalKey)&&(this.__raven_xhr={method:n,url:r,status_code:null}),e.apply(this,arguments)}},n),C(a,"send",function(e){return function(n){var a=this;function i(){if(a.__raven_xhr&&4===a.readyState){try{a.__raven_xhr.status_code=a.status}catch(t){}t.captureBreadcrumb({type:"http",category:"xhr",data:a.__raven_xhr})}}for(var o=["onload","onerror","onprogress"],s=0;s<o.length;s++)r(o[s],a);return"onreadystatechange"in a&&f(a.onreadystatechange)?C(a,"onreadystatechange",function(e){return t.wrap(e,void 0,i)}):a.onreadystatechange=i,e.apply(this,arguments)}},n)}e.xhr&&"fetch"in B&&C(B,"fetch",function(e){return function(n,r){for(var a=new Array(arguments.length),i=0;i<a.length;++i)a[i]=arguments[i];var o,s=a[0],l="GET";"string"==typeof s?o=s:"Request"in B&&s instanceof B.Request?(o=s.url,s.method&&(l=s.method)):o=""+s,a[1]&&a[1].method&&(l=a[1].method);var c={method:l,url:o,status_code:null};return t.captureBreadcrumb({type:"http",category:"fetch",data:c}),e.apply(this,a).then(function(t){return c.status_code=t.status,t})}},n),e.dom&&this._hasDocument&&(I.addEventListener?(I.addEventListener("click",t._breadcrumbEventHandler("click"),!1),I.addEventListener("keypress",t._keypressEventHandler(),!1)):(I.attachEvent("onclick",t._breadcrumbEventHandler("click")),I.attachEvent("onkeypress",t._keypressEventHandler())));var i=B.chrome,o=!(i&&i.app&&i.app.runtime)&&B.history&&history.pushState&&history.replaceState;if(e.location&&o){var s=B.onpopstate;B.onpopstate=function(){var e=t._location.href;if(t._captureUrlChange(t._lastHref,e),s)return s.apply(this,arguments)};var l=function(e){return function(){var n=arguments.length>2?arguments[2]:void 0;return n&&t._captureUrlChange(t._lastHref,n+""),e.apply(this,arguments)}};C(history,"pushState",l,n),C(history,"replaceState",l,n)}if(e.console&&"console"in B&&console.log){var c=function(e,n){t.captureBreadcrumb({message:e,level:n.level,category:"console"})};d(["debug","info","warn","error","log"],function(t,e){O(console,e,c)})}},_restoreBuiltIns:function(){for(var t;this._wrappedBuiltIns.length;){var e=(t=this._wrappedBuiltIns.shift())[0],n=t[1],r=t[2];e[n]=r}},_drainPlugins:function(){var t=this;d(this._plugins,function(e,n){var r=n[0],a=n[1];r.apply(t,[t].concat(a))})},_parseDSN:function(t){var e=j.exec(t),n={},r=7;try{for(;r--;)n[T[r]]=e[r]||""}catch(e){throw new i("Invalid DSN: "+t)}if(n.pass&&!this._globalOptions.allowSecretKey)throw new i("Do not specify your secret key in the DSN. See: http://bit.ly/raven-secret-key");return n},_getGlobalServer:function(t){var e="//"+t.host+(t.port?":"+t.port:"");return t.protocol&&(e=t.protocol+":"+e),e},_handleOnErrorStackInfo:function(){this._ignoreOnError||this._handleStackInfo.apply(this,arguments)},_handleStackInfo:function(t,e){var n=this._prepareFrames(t,e);this._triggerEvent("handle",{stackInfo:t,options:e}),this._processException(t.name,t.message,t.url,t.lineno,n,e)},_prepareFrames:function(t,e){var n=this,r=[];if(t.stack&&t.stack.length&&(d(t.stack,function(e,a){var i=n._normalizeFrame(a,t.url);i&&r.push(i)}),e&&e.trimHeadFrames))for(var a=0;a<e.trimHeadFrames&&a<r.length;a++)r[a].in_app=!1;return r=r.slice(0,this._globalOptions.stackTraceLimit)},_normalizeFrame:function(t,e){var n={filename:t.url,lineno:t.line,colno:t.column,function:t.func||"?"};return t.url||(n.filename=e),n.in_app=!(this._globalOptions.includePaths.test&&!this._globalOptions.includePaths.test(n.filename)||/(Raven|TraceKit)\./.test(n.function)||/raven\.(min\.)?js$/.test(n.filename)),n},_processException:function(t,e,n,r,a,i){var o,s=(t?t+": ":"")+(e||"");if((!this._globalOptions.ignoreErrors.test||!this._globalOptions.ignoreErrors.test(e)&&!this._globalOptions.ignoreErrors.test(s))&&(a&&a.length?(n=a[0].filename||n,a.reverse(),o={frames:a}):n&&(o={frames:[{filename:n,lineno:r,in_app:!0}]}),(!this._globalOptions.ignoreUrls.test||!this._globalOptions.ignoreUrls.test(n))&&(!this._globalOptions.whitelistUrls.test||this._globalOptions.whitelistUrls.test(n)))){var l=g({exception:{values:[{type:t,value:e,stacktrace:o}]},culprit:n},i);this._send(l)}},_trimPacket:function(t){var e=this._globalOptions.maxMessageLength;if(t.message&&(t.message=v(t.message,e)),t.exception){var n=t.exception.values[0];n.value=v(n.value,e)}var r=t.request;return r&&(r.url&&(r.url=v(r.url,this._globalOptions.maxUrlLength)),r.Referer&&(r.Referer=v(r.Referer,this._globalOptions.maxUrlLength))),t.breadcrumbs&&t.breadcrumbs.values&&this._trimBreadcrumbs(t.breadcrumbs),t},_trimBreadcrumbs:function(t){for(var e,n,r,a=["to","from","url"],i=0;i<t.values.length;++i)if((n=t.values[i]).hasOwnProperty("data")&&l(n.data)&&!_(n.data)){r=g({},n.data);for(var o=0;o<a.length;++o)e=a[o],r.hasOwnProperty(e)&&r[e]&&(r[e]=v(r[e],this._globalOptions.maxUrlLength));t.values[i].data=r}},_getHttpData:function(){if(this._hasNavigator||this._hasDocument){var t={};return this._hasNavigator&&D.userAgent&&(t.headers={"User-Agent":navigator.userAgent}),this._hasDocument&&(I.location&&I.location.href&&(t.url=I.location.href),I.referrer&&(t.headers||(t.headers={}),t.headers.Referer=I.referrer)),t}},_resetBackoff:function(){this._backoffDuration=0,this._backoffStart=null},_shouldBackoff:function(){return this._backoffDuration&&R()-this._backoffStart<this._backoffDuration},_isRepeatData:function(t){var e=this._lastData;return!(!e||t.message!==e.message||t.culprit!==e.culprit)&&(t.stacktrace||e.stacktrace?E(t.stacktrace,e.stacktrace):!t.exception&&!e.exception||w(t.exception,e.exception))},_setBackoffState:function(t){if(!this._shouldBackoff()){var e=t.status;if(400===e||401===e||429===e){var n;try{n=t.getResponseHeader("Retry-After"),n=1e3*parseInt(n,10)}catch(t){}this._backoffDuration=n||(2*this._backoffDuration||1e3),this._backoffStart=R()}}},_send:function(t){var e=this._globalOptions,n={project:this._globalProject,logger:e.logger,platform:"javascript"},r=this._getHttpData();r&&(n.request=r),t.trimHeadFrames&&delete t.trimHeadFrames,(t=g(n,t)).tags=g(g({},this._globalContext.tags),t.tags),t.extra=g(g({},this._globalContext.extra),t.extra),t.extra["session:duration"]=R()-this._startTime,this._breadcrumbs&&this._breadcrumbs.length>0&&(t.breadcrumbs={values:[].slice.call(this._breadcrumbs,0)}),p(t.tags)&&delete t.tags,this._globalContext.user&&(t.user=this._globalContext.user),e.environment&&(t.environment=e.environment),e.release&&(t.release=e.release),e.serverName&&(t.server_name=e.serverName),f(e.dataCallback)&&(t=e.dataCallback(t)||t),t&&!p(t)&&(f(e.shouldSendCallback)&&!e.shouldSendCallback(t)||(this._shouldBackoff()?this._logDebug("warn","Raven dropped error due to backoff: ",t):"number"==typeof e.sampleRate?Math.random()<e.sampleRate&&this._sendProcessedPayload(t):this._sendProcessedPayload(t)))},_getUuid:function(){return k()},_sendProcessedPayload:function(t,e){var n=this,r=this._globalOptions;if(this.isSetup())if(t=this._trimPacket(t),this._globalOptions.allowDuplicates||!this._isRepeatData(t)){this._lastEventId=t.event_id||(t.event_id=this._getUuid()),this._lastData=t,this._logDebug("debug","Raven about to send:",t);var a={sentry_version:"7",sentry_client:"raven-js/"+this.VERSION,sentry_key:this._globalKey};this._globalSecret&&(a.sentry_secret=this._globalSecret);var i=t.exception&&t.exception.values[0];this.captureBreadcrumb({category:"sentry",message:i?(i.type?i.type+": ":"")+i.value:t.message,event_id:t.event_id,level:t.level||"error"});var o=this._globalEndpoint;(r.transport||this._makeRequest).call(this,{url:o,auth:a,data:t,options:r,onSuccess:function(){n._resetBackoff(),n._triggerEvent("success",{data:t,src:o}),e&&e()},onError:function(r){n._logDebug("error","Raven transport failed to send: ",r),r.request&&n._setBackoffState(r.request),n._triggerEvent("failure",{data:t,src:o}),r=r||new Error("Raven send failed (no additional details provided)"),e&&e(r)}})}else this._logDebug("warn","Raven dropped repeat event: ",t)},_makeRequest:function(t){var e=B.XMLHttpRequest&&new B.XMLHttpRequest;if(e&&("withCredentials"in e||"undefined"!=typeof XDomainRequest)){var n=t.url;"withCredentials"in e?e.onreadystatechange=function(){if(4===e.readyState)if(200===e.status)t.onSuccess&&t.onSuccess();else if(t.onError){var n=new Error("Sentry error code: "+e.status);n.request=e,t.onError(n)}}:(e=new XDomainRequest,n=n.replace(/^https?:/,""),t.onSuccess&&(e.onload=t.onSuccess),t.onError&&(e.onerror=function(){var n=new Error("Sentry error code: XDomainRequest");n.request=e,t.onError(n)})),e.open("POST",n+"?"+y(t.auth)),e.send(a(t.data))}},_logDebug:function(t){this._originalConsoleMethods[t]&&this.debug&&Function.prototype.apply.call(this._originalConsoleMethods[t],this._originalConsole,[].slice.call(arguments,1))},_mergeContext:function(t,e){u(e)?delete this._globalContext[t]:this._globalContext[t]=g(this._globalContext[t]||{},e)}},P.prototype.setUser=P.prototype.setUserContext,P.prototype.setReleaseContext=P.prototype.setRelease,t.exports=P}).call(this,n(9))},15:function(t,e,n){(function(e){var r=n(11),a={collectWindowErrors:!0,debug:!1},i="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{},o=[].slice,s="?",l=/^(?:[Uu]ncaught (?:exception: )?)?(?:((?:Eval|Internal|Range|Reference|Syntax|Type|URI|)Error): )?(.*)$/;function c(){return"undefined"==typeof document||null==document.location?"":document.location.href}a.report=function(){var t,e,n=[],u=null,f=null,h=null;function p(t,e){var r=null;if(!e||a.collectWindowErrors){for(var i in n)if(n.hasOwnProperty(i))try{n[i].apply(null,[t].concat(o.call(arguments,2)))}catch(t){r=t}if(r)throw r}}function d(e,n,i,o,u){if(h)a.computeStackTrace.augmentStackTraceWithInitialElement(h,n,i,e),g();else if(u&&r.isError(u))p(a.computeStackTrace(u),!0);else{var f,d={url:n,line:i,column:o},v=void 0,_=e;if("[object String]"==={}.toString.call(e))(f=e.match(l))&&(v=f[1],_=f[2]);d.func=s,p({name:v,message:_,url:c(),stack:[d]},!0)}return!!t&&t.apply(this,arguments)}function g(){var t=h,e=u;u=null,h=null,f=null,p.apply(null,[t,!1].concat(e))}function v(t,e){var n=o.call(arguments,1);if(h){if(f===t)return;g()}var r=a.computeStackTrace(t);if(h=r,f=t,u=n,setTimeout(function(){f===t&&g()},r.incomplete?2e3:0),!1!==e)throw t}return v.subscribe=function(r){e||(t=i.onerror,i.onerror=d,e=!0),n.push(r)},v.unsubscribe=function(t){for(var e=n.length-1;e>=0;--e)n[e]===t&&n.splice(e,1)},v.uninstall=function(){e&&(i.onerror=t,e=!1,t=void 0),n=[]},v}(),a.computeStackTrace=function(){function t(t){if(void 0!==t.stack&&t.stack){for(var e,n,r,a=/^\s*at (.*?) ?\(((?:file|https?|blob|chrome-extension|native|eval|webpack|<anonymous>|[a-z]:|\/).*?)(?::(\d+))?(?::(\d+))?\)?\s*$/i,i=/^\s*(.*?)(?:\((.*?)\))?(?:^|@)((?:file|https?|blob|chrome|webpack|resource|\[native).*?|[^@]*bundle)(?::(\d+))?(?::(\d+))?\s*$/i,o=/^\s*at (?:((?:\[object object\])?.+) )?\(?((?:file|ms-appx|https?|webpack|blob):.*?):(\d+)(?::(\d+))?\)?\s*$/i,l=/(\S+) line (\d+)(?: > eval line \d+)* > eval/i,u=/\((\S*)(?::(\d+))(?::(\d+))\)/,f=t.stack.split("\n"),h=[],p=(/^(.*) is undefined$/.exec(t.message),0),d=f.length;p<d;++p){if(n=a.exec(f[p])){var g=n[2]&&0===n[2].indexOf("native");n[2]&&0===n[2].indexOf("eval")&&(e=u.exec(n[2]))&&(n[2]=e[1],n[3]=e[2],n[4]=e[3]),r={url:g?null:n[2],func:n[1]||s,args:g?[n[2]]:[],line:n[3]?+n[3]:null,column:n[4]?+n[4]:null}}else if(n=o.exec(f[p]))r={url:n[2],func:n[1]||s,args:[],line:+n[3],column:n[4]?+n[4]:null};else{if(!(n=i.exec(f[p])))continue;n[3]&&n[3].indexOf(" > eval")>-1&&(e=l.exec(n[3]))?(n[3]=e[1],n[4]=e[2],n[5]=null):0!==p||n[5]||void 0===t.columnNumber||(h[0].column=t.columnNumber+1),r={url:n[3],func:n[1]||s,args:n[2]?n[2].split(","):[],line:n[4]?+n[4]:null,column:n[5]?+n[5]:null}}!r.func&&r.line&&(r.func=s),h.push(r)}return h.length?{name:t.name,message:t.message,url:c(),stack:h}:null}}function e(t,e,n,r){var a={url:e,line:n};if(a.url&&a.line){if(t.incomplete=!1,a.func||(a.func=s),t.stack.length>0&&t.stack[0].url===a.url){if(t.stack[0].line===a.line)return!1;if(!t.stack[0].line&&t.stack[0].func===a.func)return t.stack[0].line=a.line,!1}return t.stack.unshift(a),t.partial=!0,!0}return t.incomplete=!0,!1}function n(t,i){for(var o,l,u=/function\s+([_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*)?\s*\(/i,f=[],h={},p=!1,d=n.caller;d&&!p;d=d.caller)if(d!==r&&d!==a.report){if(l={url:null,func:s,line:null,column:null},d.name?l.func=d.name:(o=u.exec(d.toString()))&&(l.func=o[1]),void 0===l.func)try{l.func=o.input.substring(0,o.input.indexOf("{"))}catch(t){}h[""+d]?p=!0:h[""+d]=!0,f.push(l)}i&&f.splice(0,i);var g={name:t.name,message:t.message,url:c(),stack:f};return e(g,t.sourceURL||t.fileName,t.line||t.lineNumber,t.message||t.description),g}function r(e,r){var i=null;r=null==r?0:+r;try{if(i=t(e))return i}catch(t){if(a.debug)throw t}try{if(i=n(e,r+1))return i}catch(t){if(a.debug)throw t}return{name:e.name,message:e.message,url:c()}}return r.augmentStackTraceWithInitialElement=e,r.computeStackTraceFromStackProp=t,r}(),t.exports=a}).call(this,n(9))},16:function(t,e){function n(t,e){for(var n=0;n<t.length;++n)if(t[n]===e)return n;return-1}function r(t,e){var r=[],a=[];return null==e&&(e=function(t,e){return r[0]===e?"[Circular ~]":"[Circular ~."+a.slice(0,n(r,e)).join(".")+"]"}),function(i,o){if(r.length>0){var s=n(r,this);~s?r.splice(s+1):r.push(this),~s?a.splice(s,1/0,i):a.push(i),~n(r,o)&&(o=e.call(this,i,o))}else r.push(o);return null==t?o instanceof Error?function(t){var e={stack:t.stack,message:t.message,name:t.name};for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n]);return e}(o):o:t.call(this,i,o)}}(t.exports=function(t,e,n,a){return JSON.stringify(t,r(e,a),n)}).getSerialize=r},17:function(t,e){function n(t){this.name="RavenConfigError",this.message=t}n.prototype=new Error,n.prototype.constructor=n,t.exports=n},18:function(t,e){t.exports={wrapMethod:function(t,e,n){var r=t[e],a=t;if(e in t){var i="warn"===e?"warning":e;t[e]=function(){var t=[].slice.call(arguments),o=""+t.join(" "),s={level:i,logger:"console",extra:{arguments:t}};"assert"===e?!1===t[0]&&(o="Assertion failed: "+(t.slice(1).join(" ")||"console.assert"),s.extra.arguments=t.slice(1),n&&n(o,s)):n&&n(o,s),r&&Function.prototype.apply.call(r,a,t)}}}}},2:function(t,e){t.exports=window.jQuery},4:function(t,e,n){"use strict";n.d(e,"a",function(){return o});var r=n(8),a=n.n(r),i=n(1);function o(){"prod"===i.c&&(a.a.config("https://e9b8f382cdd130c0d415cd977d2be56f@exceptions.hubspot.com/1",{instrument:{tryCatch:!1}}).install(),a.a.setTagsContext({leadin:i.h,php:i.j,wordpress:i.o}),a.a.setUserContext({hub:i.n,plugins:Object.keys(i.l).map(function(t){return"".concat(t,"#").concat(i.l[t].Version)}).join(",")}))}e.b=a.a},5:function(t,e,n){"use strict";n.d(e,"a",function(){return r});var r={iframe:"#leadin-iframe",spaNavigationButtons:'.toplevel_page_leadin > a, a[href="admin.php?page=leadin_forms"], a[href="admin.php?page=leadin_settings"]',subMenuButtons:".toplevel_page_leadin > ul > li",deactivatePluginButton:'[data-slug="leadin"] .deactivate a',deactivateFeedbackForm:"form.leadin-deactivate-form",deactivateFeedbackSubmit:"button#leadin-feedback-submit",deactivateFeedbackSkip:"button#leadin-feedback-skip",thickboxModalClose:".leadin-modal-close",thickboxModalWindow:"div#TB_window.thickbox-loading",thickboxModalContent:"div#TB_ajaxContent.TB_modal"}},50:function(t,e,n){"use strict";n.r(e);var r=n(2),a=n.n(r),i=n(4),o=n(5);function s(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}var l=function(){function t(e,n,r,i){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.openTriggerSelector=e,this.inlineContentId=n,this.windowCssClass=r,this.contentCssClass=i,a()(e).click(this.init.bind(this))}var e,n,r;return e=t,(n=[{key:"close",value:function(){window.tb_remove()}},{key:"init",value:function(t){window.tb_show("","#TB_inline?inlineId=".concat(this.inlineContentId,"&modal=true")),a()(o.a.thickboxModalWindow).addClass(this.windowCssClass),a()(o.a.thickboxModalContent).addClass(this.contentCssClass),a()(o.a.thickboxModalClose).unbind("click").click(this.close),t.preventDefault()}}])&&s(e.prototype,n),r&&s(e,r),t}(),c="https://api.hsforms.com/submissions/v3/integration/submit/".concat("6275621","/").concat("0e8807f8-2ac3-4664-b742-44552bfa09e2");function u(){window.location.href=a()(o.a.deactivatePluginButton).attr("href")}function f(t){var e,n;t.preventDefault(),a()(o.a.deactivateFeedbackSubmit).addClass("loading"),(e=o.a.deactivateFeedbackForm,n={fields:a()(e).serializeArray(),skipValidation:!0},new Promise(function(t,e){a.a.ajax({type:"POST",url:c,contentType:"application/json",data:JSON.stringify(n),success:t,error:e})})).then(u).catch(function(t){i.b.captureException(t),u()})}function h(){new l(o.a.deactivatePluginButton,"leadin-feedback-container","leadin-feedback-window","leadin-feedback-content");a()(o.a.deactivateFeedbackForm).unbind("submit").submit(f),a()(o.a.deactivateFeedbackSkip).unbind("click").click(u)}a()(document).ready(function(){Object(i.a)(),i.b.context(h)})},8:function(t,e,n){(function(e){var r=n(14),a="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{},i=a.Raven,o=new r;o.noConflict=function(){return a.Raven=i,o},o.afterLoad(),t.exports=o}).call(this,n(9))},9:function(t,e){var n;n=function(){return this}();try{n=n||new Function("return this")()}catch(t){"object"==typeof window&&(n=window)}t.exports=n}});
//# sourceMappingURL=feedback.js.map