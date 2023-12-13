import{s as nt,B,u as Q,au as rt,n as st,d as Ge,_ as ot,j as N,af as qe,H as ae,e as it,f as ct,Z as at,a7 as lt,bb as ut}from"./@vue-110897a1.js";/*!
  * vue-router v4.2.5
  * (c) 2023 Eduardo San Martin Morote
  * @license MIT
  */const q=typeof window<"u";function ft(e){return e.__esModule||e[Symbol.toStringTag]==="Module"}const S=Object.assign;function le(e,t){const n={};for(const r in t){const s=t[r];n[r]=L(s)?s.map(e):e(s)}return n}const F=()=>{},L=Array.isArray,ht=/\/$/,dt=e=>e.replace(ht,"");function ue(e,t,n="/"){let r,s={},l="",d="";const m=t.indexOf("#");let c=t.indexOf("?");return m<c&&m>=0&&(c=-1),c>-1&&(r=t.slice(0,c),l=t.slice(c+1,m>-1?m:t.length),s=e(l)),m>-1&&(r=r||t.slice(0,m),d=t.slice(m,t.length)),r=vt(r??t,n),{fullPath:r+(l&&"?")+l+d,path:r,query:s,hash:d}}function pt(e,t){const n=t.query?e(t.query):"";return t.path+(n&&"?")+n+(t.hash||"")}function Ce(e,t){return!t||!e.toLowerCase().startsWith(t.toLowerCase())?e:e.slice(t.length)||"/"}function mt(e,t,n){const r=t.matched.length-1,s=n.matched.length-1;return r>-1&&r===s&&z(t.matched[r],n.matched[s])&&ze(t.params,n.params)&&e(t.query)===e(n.query)&&t.hash===n.hash}function z(e,t){return(e.aliasOf||e)===(t.aliasOf||t)}function ze(e,t){if(Object.keys(e).length!==Object.keys(t).length)return!1;for(const n in e)if(!gt(e[n],t[n]))return!1;return!0}function gt(e,t){return L(e)?be(e,t):L(t)?be(t,e):e===t}function be(e,t){return L(t)?e.length===t.length&&e.every((n,r)=>n===t[r]):e.length===1&&e[0]===t}function vt(e,t){if(e.startsWith("/"))return e;if(!e)return t;const n=t.split("/"),r=e.split("/"),s=r[r.length-1];(s===".."||s===".")&&r.push("");let l=n.length-1,d,m;for(d=0;d<r.length;d++)if(m=r[d],m!==".")if(m==="..")l>1&&l--;else break;return n.slice(0,l).join("/")+"/"+r.slice(d-(d===r.length?1:0)).join("/")}var X;(function(e){e.pop="pop",e.push="push"})(X||(X={}));var Y;(function(e){e.back="back",e.forward="forward",e.unknown=""})(Y||(Y={}));function yt(e){if(!e)if(q){const t=document.querySelector("base");e=t&&t.getAttribute("href")||"/",e=e.replace(/^\w+:\/\/[^\/]+/,"")}else e="/";return e[0]!=="/"&&e[0]!=="#"&&(e="/"+e),dt(e)}const Rt=/^[^#]+#/;function Et(e,t){return e.replace(Rt,"#")+t}function Pt(e,t){const n=document.documentElement.getBoundingClientRect(),r=e.getBoundingClientRect();return{behavior:t.behavior,left:r.left-n.left-(t.left||0),top:r.top-n.top-(t.top||0)}}const te=()=>({left:window.pageXOffset,top:window.pageYOffset});function wt(e){let t;if("el"in e){const n=e.el,r=typeof n=="string"&&n.startsWith("#"),s=typeof n=="string"?r?document.getElementById(n.slice(1)):document.querySelector(n):n;if(!s)return;t=Pt(s,e)}else t=e;"scrollBehavior"in document.documentElement.style?window.scrollTo(t):window.scrollTo(t.left!=null?t.left:window.pageXOffset,t.top!=null?t.top:window.pageYOffset)}function ke(e,t){return(history.state?history.state.position-t:-1)+e}const he=new Map;function St(e,t){he.set(e,t)}function Ct(e){const t=he.get(e);return he.delete(e),t}let bt=()=>location.protocol+"//"+location.host;function Ue(e,t){const{pathname:n,search:r,hash:s}=t,l=e.indexOf("#");if(l>-1){let m=s.includes(e.slice(l))?e.slice(l).length:1,c=s.slice(m);return c[0]!=="/"&&(c="/"+c),Ce(c,"")}return Ce(n,e)+r+s}function kt(e,t,n,r){let s=[],l=[],d=null;const m=({state:u})=>{const g=Ue(e,location),R=n.value,k=t.value;let b=0;if(u){if(n.value=g,t.value=u,d&&d===R){d=null;return}b=k?u.position-k.position:0}else r(g);s.forEach(E=>{E(n.value,R,{delta:b,type:X.pop,direction:b?b>0?Y.forward:Y.back:Y.unknown})})};function c(){d=n.value}function f(u){s.push(u);const g=()=>{const R=s.indexOf(u);R>-1&&s.splice(R,1)};return l.push(g),g}function o(){const{history:u}=window;u.state&&u.replaceState(S({},u.state,{scroll:te()}),"")}function a(){for(const u of l)u();l=[],window.removeEventListener("popstate",m),window.removeEventListener("beforeunload",o)}return window.addEventListener("popstate",m),window.addEventListener("beforeunload",o,{passive:!0}),{pauseListeners:c,listen:f,destroy:a}}function Ae(e,t,n,r=!1,s=!1){return{back:e,current:t,forward:n,replaced:r,position:window.history.length,scroll:s?te():null}}function At(e){const{history:t,location:n}=window,r={value:Ue(e,n)},s={value:t.state};s.value||l(r.value,{back:null,current:r.value,forward:null,position:t.length-1,replaced:!0,scroll:null},!0);function l(c,f,o){const a=e.indexOf("#"),u=a>-1?(n.host&&document.querySelector("base")?e:e.slice(a))+c:bt()+e+c;try{t[o?"replaceState":"pushState"](f,"",u),s.value=f}catch(g){console.error(g),n[o?"replace":"assign"](u)}}function d(c,f){const o=S({},t.state,Ae(s.value.back,c,s.value.forward,!0),f,{position:s.value.position});l(c,o,!0),r.value=c}function m(c,f){const o=S({},s.value,t.state,{forward:c,scroll:te()});l(o.current,o,!0);const a=S({},Ae(r.value,c,null),{position:o.position+1},f);l(c,a,!1),r.value=c}return{location:r,state:s,push:m,replace:d}}function _t(e){e=yt(e);const t=At(e),n=kt(e,t.state,t.location,t.replace);function r(l,d=!0){d||n.pauseListeners(),history.go(l)}const s=S({location:"",base:e,go:r,createHref:Et.bind(null,e)},t,n);return Object.defineProperty(s,"location",{enumerable:!0,get:()=>t.location.value}),Object.defineProperty(s,"state",{enumerable:!0,get:()=>t.state.value}),s}function mn(e){return e=location.host?e||location.pathname+location.search:"",e.includes("#")||(e+="#"),_t(e)}function Ot(e){return typeof e=="string"||e&&typeof e=="object"}function Ke(e){return typeof e=="string"||typeof e=="symbol"}const T={path:"/",name:void 0,params:{},query:{},hash:"",fullPath:"/",matched:[],meta:{},redirectedFrom:void 0},Ve=Symbol("");var _e;(function(e){e[e.aborted=4]="aborted",e[e.cancelled=8]="cancelled",e[e.duplicated=16]="duplicated"})(_e||(_e={}));function U(e,t){return S(new Error,{type:e,[Ve]:!0},t)}function I(e,t){return e instanceof Error&&Ve in e&&(t==null||!!(e.type&t))}const Oe="[^/]+?",xt={sensitive:!1,strict:!1,start:!0,end:!0},Mt=/[.+*?^${}()[\]/\\]/g;function Lt(e,t){const n=S({},xt,t),r=[];let s=n.start?"^":"";const l=[];for(const f of e){const o=f.length?[]:[90];n.strict&&!f.length&&(s+="/");for(let a=0;a<f.length;a++){const u=f[a];let g=40+(n.sensitive?.25:0);if(u.type===0)a||(s+="/"),s+=u.value.replace(Mt,"\\$&"),g+=40;else if(u.type===1){const{value:R,repeatable:k,optional:b,regexp:E}=u;l.push({name:R,repeatable:k,optional:b});const w=E||Oe;if(w!==Oe){g+=10;try{new RegExp(`(${w})`)}catch(M){throw new Error(`Invalid custom RegExp for param "${R}" (${w}): `+M.message)}}let O=k?`((?:${w})(?:/(?:${w}))*)`:`(${w})`;a||(O=b&&f.length<2?`(?:/${O})`:"/"+O),b&&(O+="?"),s+=O,g+=20,b&&(g+=-8),k&&(g+=-20),w===".*"&&(g+=-50)}o.push(g)}r.push(o)}if(n.strict&&n.end){const f=r.length-1;r[f][r[f].length-1]+=.7000000000000001}n.strict||(s+="/?"),n.end?s+="$":n.strict&&(s+="(?:/|$)");const d=new RegExp(s,n.sensitive?"":"i");function m(f){const o=f.match(d),a={};if(!o)return null;for(let u=1;u<o.length;u++){const g=o[u]||"",R=l[u-1];a[R.name]=g&&R.repeatable?g.split("/"):g}return a}function c(f){let o="",a=!1;for(const u of e){(!a||!o.endsWith("/"))&&(o+="/"),a=!1;for(const g of u)if(g.type===0)o+=g.value;else if(g.type===1){const{value:R,repeatable:k,optional:b}=g,E=R in f?f[R]:"";if(L(E)&&!k)throw new Error(`Provided param "${R}" is an array but it is not repeatable (* or + modifiers)`);const w=L(E)?E.join("/"):E;if(!w)if(b)u.length<2&&(o.endsWith("/")?o=o.slice(0,-1):a=!0);else throw new Error(`Missing required param "${R}"`);o+=w}}return o||"/"}return{re:d,score:r,keys:l,parse:m,stringify:c}}function Nt(e,t){let n=0;for(;n<e.length&&n<t.length;){const r=t[n]-e[n];if(r)return r;n++}return e.length<t.length?e.length===1&&e[0]===40+40?-1:1:e.length>t.length?t.length===1&&t[0]===40+40?1:-1:0}function jt(e,t){let n=0;const r=e.score,s=t.score;for(;n<r.length&&n<s.length;){const l=Nt(r[n],s[n]);if(l)return l;n++}if(Math.abs(s.length-r.length)===1){if(xe(r))return 1;if(xe(s))return-1}return s.length-r.length}function xe(e){const t=e[e.length-1];return e.length>0&&t[t.length-1]<0}const It={type:0,value:""},Tt=/[a-zA-Z0-9_]/;function $t(e){if(!e)return[[]];if(e==="/")return[[It]];if(!e.startsWith("/"))throw new Error(`Invalid path "${e}"`);function t(g){throw new Error(`ERR (${n})/"${f}": ${g}`)}let n=0,r=n;const s=[];let l;function d(){l&&s.push(l),l=[]}let m=0,c,f="",o="";function a(){f&&(n===0?l.push({type:0,value:f}):n===1||n===2||n===3?(l.length>1&&(c==="*"||c==="+")&&t(`A repeatable param (${f}) must be alone in its segment. eg: '/:ids+.`),l.push({type:1,value:f,regexp:o,repeatable:c==="*"||c==="+",optional:c==="*"||c==="?"})):t("Invalid state to consume buffer"),f="")}function u(){f+=c}for(;m<e.length;){if(c=e[m++],c==="\\"&&n!==2){r=n,n=4;continue}switch(n){case 0:c==="/"?(f&&a(),d()):c===":"?(a(),n=1):u();break;case 4:u(),n=r;break;case 1:c==="("?n=2:Tt.test(c)?u():(a(),n=0,c!=="*"&&c!=="?"&&c!=="+"&&m--);break;case 2:c===")"?o[o.length-1]=="\\"?o=o.slice(0,-1)+c:n=3:o+=c;break;case 3:a(),n=0,c!=="*"&&c!=="?"&&c!=="+"&&m--,o="";break;default:t("Unknown state");break}}return n===2&&t(`Unfinished custom RegExp for param "${f}"`),a(),d(),s}function Bt(e,t,n){const r=Lt($t(e.path),n),s=S(r,{record:e,parent:t,children:[],alias:[]});return t&&!s.record.aliasOf==!t.record.aliasOf&&t.children.push(s),s}function Ht(e,t){const n=[],r=new Map;t=Ne({strict:!1,end:!0,sensitive:!1},t);function s(o){return r.get(o)}function l(o,a,u){const g=!u,R=Gt(o);R.aliasOf=u&&u.record;const k=Ne(t,o),b=[R];if("alias"in o){const O=typeof o.alias=="string"?[o.alias]:o.alias;for(const M of O)b.push(S({},R,{components:u?u.record.components:R.components,path:M,aliasOf:u?u.record:R}))}let E,w;for(const O of b){const{path:M}=O;if(a&&M[0]!=="/"){const H=a.record.path,j=H[H.length-1]==="/"?"":"/";O.path=a.record.path+(M&&j+M)}if(E=Bt(O,a,k),u?u.alias.push(E):(w=w||E,w!==E&&w.alias.push(E),g&&o.name&&!Le(E)&&d(o.name)),R.children){const H=R.children;for(let j=0;j<H.length;j++)l(H[j],E,u&&u.children[j])}u=u||E,(E.record.components&&Object.keys(E.record.components).length||E.record.name||E.record.redirect)&&c(E)}return w?()=>{d(w)}:F}function d(o){if(Ke(o)){const a=r.get(o);a&&(r.delete(o),n.splice(n.indexOf(a),1),a.children.forEach(d),a.alias.forEach(d))}else{const a=n.indexOf(o);a>-1&&(n.splice(a,1),o.record.name&&r.delete(o.record.name),o.children.forEach(d),o.alias.forEach(d))}}function m(){return n}function c(o){let a=0;for(;a<n.length&&jt(o,n[a])>=0&&(o.record.path!==n[a].record.path||!De(o,n[a]));)a++;n.splice(a,0,o),o.record.name&&!Le(o)&&r.set(o.record.name,o)}function f(o,a){let u,g={},R,k;if("name"in o&&o.name){if(u=r.get(o.name),!u)throw U(1,{location:o});k=u.record.name,g=S(Me(a.params,u.keys.filter(w=>!w.optional).map(w=>w.name)),o.params&&Me(o.params,u.keys.map(w=>w.name))),R=u.stringify(g)}else if("path"in o)R=o.path,u=n.find(w=>w.re.test(R)),u&&(g=u.parse(R),k=u.record.name);else{if(u=a.name?r.get(a.name):n.find(w=>w.re.test(a.path)),!u)throw U(1,{location:o,currentLocation:a});k=u.record.name,g=S({},a.params,o.params),R=u.stringify(g)}const b=[];let E=u;for(;E;)b.unshift(E.record),E=E.parent;return{name:k,path:R,params:g,matched:b,meta:zt(b)}}return e.forEach(o=>l(o)),{addRoute:l,resolve:f,removeRoute:d,getRoutes:m,getRecordMatcher:s}}function Me(e,t){const n={};for(const r of t)r in e&&(n[r]=e[r]);return n}function Gt(e){return{path:e.path,redirect:e.redirect,name:e.name,meta:e.meta||{},aliasOf:void 0,beforeEnter:e.beforeEnter,props:qt(e),children:e.children||[],instances:{},leaveGuards:new Set,updateGuards:new Set,enterCallbacks:{},components:"components"in e?e.components||null:e.component&&{default:e.component}}}function qt(e){const t={},n=e.props||!1;if("component"in e)t.default=n;else for(const r in e.components)t[r]=typeof n=="object"?n[r]:n;return t}function Le(e){for(;e;){if(e.record.aliasOf)return!0;e=e.parent}return!1}function zt(e){return e.reduce((t,n)=>S(t,n.meta),{})}function Ne(e,t){const n={};for(const r in e)n[r]=r in t?t[r]:e[r];return n}function De(e,t){return t.children.some(n=>n===e||De(e,n))}const We=/#/g,Ut=/&/g,Kt=/\//g,Vt=/=/g,Dt=/\?/g,Qe=/\+/g,Wt=/%5B/g,Qt=/%5D/g,Fe=/%5E/g,Ft=/%60/g,Ye=/%7B/g,Yt=/%7C/g,Xe=/%7D/g,Xt=/%20/g;function me(e){return encodeURI(""+e).replace(Yt,"|").replace(Wt,"[").replace(Qt,"]")}function Zt(e){return me(e).replace(Ye,"{").replace(Xe,"}").replace(Fe,"^")}function de(e){return me(e).replace(Qe,"%2B").replace(Xt,"+").replace(We,"%23").replace(Ut,"%26").replace(Ft,"`").replace(Ye,"{").replace(Xe,"}").replace(Fe,"^")}function Jt(e){return de(e).replace(Vt,"%3D")}function en(e){return me(e).replace(We,"%23").replace(Dt,"%3F")}function tn(e){return e==null?"":en(e).replace(Kt,"%2F")}function ee(e){try{return decodeURIComponent(""+e)}catch{}return""+e}function nn(e){const t={};if(e===""||e==="?")return t;const r=(e[0]==="?"?e.slice(1):e).split("&");for(let s=0;s<r.length;++s){const l=r[s].replace(Qe," "),d=l.indexOf("="),m=ee(d<0?l:l.slice(0,d)),c=d<0?null:ee(l.slice(d+1));if(m in t){let f=t[m];L(f)||(f=t[m]=[f]),f.push(c)}else t[m]=c}return t}function je(e){let t="";for(let n in e){const r=e[n];if(n=Jt(n),r==null){r!==void 0&&(t+=(t.length?"&":"")+n);continue}(L(r)?r.map(l=>l&&de(l)):[r&&de(r)]).forEach(l=>{l!==void 0&&(t+=(t.length?"&":"")+n,l!=null&&(t+="="+l))})}return t}function rn(e){const t={};for(const n in e){const r=e[n];r!==void 0&&(t[n]=L(r)?r.map(s=>s==null?null:""+s):r==null?r:""+r)}return t}const Ze=Symbol(""),Ie=Symbol(""),ne=Symbol(""),ge=Symbol(""),pe=Symbol("");function W(){let e=[];function t(r){return e.push(r),()=>{const s=e.indexOf(r);s>-1&&e.splice(s,1)}}function n(){e=[]}return{add:t,list:()=>e.slice(),reset:n}}function sn(e,t,n){const r=()=>{e[t].delete(n)};at(r),lt(r),ut(()=>{e[t].add(n)}),e[t].add(n)}function gn(e){const t=B(Ze,{}).value;t&&sn(t,"updateGuards",e)}function $(e,t,n,r,s){const l=r&&(r.enterCallbacks[s]=r.enterCallbacks[s]||[]);return()=>new Promise((d,m)=>{const c=a=>{a===!1?m(U(4,{from:n,to:t})):a instanceof Error?m(a):Ot(a)?m(U(2,{from:t,to:a})):(l&&r.enterCallbacks[s]===l&&typeof a=="function"&&l.push(a),d())},f=e.call(r&&r.instances[s],t,n,c);let o=Promise.resolve(f);e.length<3&&(o=o.then(c)),o.catch(a=>m(a))})}function fe(e,t,n,r){const s=[];for(const l of e)for(const d in l.components){let m=l.components[d];if(!(t!=="beforeRouteEnter"&&!l.instances[d]))if(on(m)){const f=(m.__vccOpts||m)[t];f&&s.push($(f,n,r,l,d))}else{let c=m();s.push(()=>c.then(f=>{if(!f)return Promise.reject(new Error(`Couldn't resolve component "${d}" at "${l.path}"`));const o=ft(f)?f.default:f;l.components[d]=o;const u=(o.__vccOpts||o)[t];return u&&$(u,n,r,l,d)()}))}}return s}function on(e){return typeof e=="object"||"displayName"in e||"props"in e||"__vccOpts"in e}function Te(e){const t=B(ne),n=B(ge),r=N(()=>t.resolve(Q(e.to))),s=N(()=>{const{matched:c}=r.value,{length:f}=c,o=c[f-1],a=n.matched;if(!o||!a.length)return-1;const u=a.findIndex(z.bind(null,o));if(u>-1)return u;const g=$e(c[f-2]);return f>1&&$e(o)===g&&a[a.length-1].path!==g?a.findIndex(z.bind(null,c[f-2])):u}),l=N(()=>s.value>-1&&un(n.params,r.value.params)),d=N(()=>s.value>-1&&s.value===n.matched.length-1&&ze(n.params,r.value.params));function m(c={}){return ln(c)?t[Q(e.replace)?"replace":"push"](Q(e.to)).catch(F):Promise.resolve()}return{route:r,href:N(()=>r.value.href),isActive:l,isExactActive:d,navigate:m}}const cn=Ge({name:"RouterLink",compatConfig:{MODE:3},props:{to:{type:[String,Object],required:!0},replace:Boolean,activeClass:String,exactActiveClass:String,custom:Boolean,ariaCurrentValue:{type:String,default:"page"}},useLink:Te,setup(e,{slots:t}){const n=ot(Te(e)),{options:r}=B(ne),s=N(()=>({[Be(e.activeClass,r.linkActiveClass,"router-link-active")]:n.isActive,[Be(e.exactActiveClass,r.linkExactActiveClass,"router-link-exact-active")]:n.isExactActive}));return()=>{const l=t.default&&t.default(n);return e.custom?l:qe("a",{"aria-current":n.isExactActive?e.ariaCurrentValue:null,href:n.href,onClick:n.navigate,class:s.value},l)}}}),an=cn;function ln(e){if(!(e.metaKey||e.altKey||e.ctrlKey||e.shiftKey)&&!e.defaultPrevented&&!(e.button!==void 0&&e.button!==0)){if(e.currentTarget&&e.currentTarget.getAttribute){const t=e.currentTarget.getAttribute("target");if(/\b_blank\b/i.test(t))return}return e.preventDefault&&e.preventDefault(),!0}}function un(e,t){for(const n in t){const r=t[n],s=e[n];if(typeof r=="string"){if(r!==s)return!1}else if(!L(s)||s.length!==r.length||r.some((l,d)=>l!==s[d]))return!1}return!0}function $e(e){return e?e.aliasOf?e.aliasOf.path:e.path:""}const Be=(e,t,n)=>e??t??n,fn=Ge({name:"RouterView",inheritAttrs:!1,props:{name:{type:String,default:"default"},route:Object},compatConfig:{MODE:3},setup(e,{attrs:t,slots:n}){const r=B(pe),s=N(()=>e.route||r.value),l=B(Ie,0),d=N(()=>{let f=Q(l);const{matched:o}=s.value;let a;for(;(a=o[f])&&!a.components;)f++;return f}),m=N(()=>s.value.matched[d.value]);ae(Ie,N(()=>d.value+1)),ae(Ze,m),ae(pe,s);const c=it();return ct(()=>[c.value,m.value,e.name],([f,o,a],[u,g,R])=>{o&&(o.instances[a]=f,g&&g!==o&&f&&f===u&&(o.leaveGuards.size||(o.leaveGuards=g.leaveGuards),o.updateGuards.size||(o.updateGuards=g.updateGuards))),f&&o&&(!g||!z(o,g)||!u)&&(o.enterCallbacks[a]||[]).forEach(k=>k(f))},{flush:"post"}),()=>{const f=s.value,o=e.name,a=m.value,u=a&&a.components[o];if(!u)return He(n.default,{Component:u,route:f});const g=a.props[o],R=g?g===!0?f.params:typeof g=="function"?g(f):g:null,b=qe(u,S({},R,t,{onVnodeUnmounted:E=>{E.component.isUnmounted&&(a.instances[o]=null)},ref:c}));return He(n.default,{Component:b,route:f})||b}}});function He(e,t){if(!e)return null;const n=e(t);return n.length===1?n[0]:n}const hn=fn;function vn(e){const t=Ht(e.routes,e),n=e.parseQuery||nn,r=e.stringifyQuery||je,s=e.history,l=W(),d=W(),m=W(),c=nt(T);let f=T;q&&e.scrollBehavior&&"scrollRestoration"in history&&(history.scrollRestoration="manual");const o=le.bind(null,i=>""+i),a=le.bind(null,tn),u=le.bind(null,ee);function g(i,p){let h,v;return Ke(i)?(h=t.getRecordMatcher(i),v=p):v=i,t.addRoute(v,h)}function R(i){const p=t.getRecordMatcher(i);p&&t.removeRoute(p)}function k(){return t.getRoutes().map(i=>i.record)}function b(i){return!!t.getRecordMatcher(i)}function E(i,p){if(p=S({},p||c.value),typeof i=="string"){const y=ue(n,i,p.path),_=t.resolve({path:y.path},p),D=s.createHref(y.fullPath);return S(y,_,{params:u(_.params),hash:ee(y.hash),redirectedFrom:void 0,href:D})}let h;if("path"in i)h=S({},i,{path:ue(n,i.path,p.path).path});else{const y=S({},i.params);for(const _ in y)y[_]==null&&delete y[_];h=S({},i,{params:a(y)}),p.params=a(p.params)}const v=t.resolve(h,p),C=i.hash||"";v.params=o(u(v.params));const A=pt(r,S({},i,{hash:Zt(C),path:v.path})),P=s.createHref(A);return S({fullPath:A,hash:C,query:r===je?rn(i.query):i.query||{}},v,{redirectedFrom:void 0,href:P})}function w(i){return typeof i=="string"?ue(n,i,c.value.path):S({},i)}function O(i,p){if(f!==i)return U(8,{from:p,to:i})}function M(i){return K(i)}function H(i){return M(S(w(i),{replace:!0}))}function j(i){const p=i.matched[i.matched.length-1];if(p&&p.redirect){const{redirect:h}=p;let v=typeof h=="function"?h(i):h;return typeof v=="string"&&(v=v.includes("?")||v.includes("#")?v=w(v):{path:v},v.params={}),S({query:i.query,hash:i.hash,params:"path"in v?{}:i.params},v)}}function K(i,p){const h=f=E(i),v=c.value,C=i.state,A=i.force,P=i.replace===!0,y=j(h);if(y)return K(S(w(y),{state:typeof y=="object"?S({},C,y.state):C,force:A,replace:P}),p||h);const _=h;_.redirectedFrom=p;let D;return!A&&mt(r,v,h)&&(D=U(16,{to:_,from:v}),we(v,v,!0,!1)),(D?Promise.resolve(D):ye(_,v)).catch(x=>I(x)?I(x,2)?x:oe(x):se(x,_,v)).then(x=>{if(x){if(I(x,2))return K(S({replace:P},w(x.to),{state:typeof x.to=="object"?S({},C,x.to.state):C,force:A}),p||_)}else x=Ee(_,v,!0,P,C);return Re(_,v,x),x})}function Je(i,p){const h=O(i,p);return h?Promise.reject(h):Promise.resolve()}function ve(i){const p=J.values().next().value;return p&&typeof p.runWithContext=="function"?p.runWithContext(i):i()}function ye(i,p){let h;const[v,C,A]=dn(i,p);h=fe(v.reverse(),"beforeRouteLeave",i,p);for(const y of v)y.leaveGuards.forEach(_=>{h.push($(_,i,p))});const P=Je.bind(null,i,p);return h.push(P),G(h).then(()=>{h=[];for(const y of l.list())h.push($(y,i,p));return h.push(P),G(h)}).then(()=>{h=fe(C,"beforeRouteUpdate",i,p);for(const y of C)y.updateGuards.forEach(_=>{h.push($(_,i,p))});return h.push(P),G(h)}).then(()=>{h=[];for(const y of A)if(y.beforeEnter)if(L(y.beforeEnter))for(const _ of y.beforeEnter)h.push($(_,i,p));else h.push($(y.beforeEnter,i,p));return h.push(P),G(h)}).then(()=>(i.matched.forEach(y=>y.enterCallbacks={}),h=fe(A,"beforeRouteEnter",i,p),h.push(P),G(h))).then(()=>{h=[];for(const y of d.list())h.push($(y,i,p));return h.push(P),G(h)}).catch(y=>I(y,8)?y:Promise.reject(y))}function Re(i,p,h){m.list().forEach(v=>ve(()=>v(i,p,h)))}function Ee(i,p,h,v,C){const A=O(i,p);if(A)return A;const P=p===T,y=q?history.state:{};h&&(v||P?s.replace(i.fullPath,S({scroll:P&&y&&y.scroll},C)):s.push(i.fullPath,C)),c.value=i,we(i,p,h,P),oe()}let V;function et(){V||(V=s.listen((i,p,h)=>{if(!Se.listening)return;const v=E(i),C=j(v);if(C){K(S(C,{replace:!0}),v).catch(F);return}f=v;const A=c.value;q&&St(ke(A.fullPath,h.delta),te()),ye(v,A).catch(P=>I(P,12)?P:I(P,2)?(K(P.to,v).then(y=>{I(y,20)&&!h.delta&&h.type===X.pop&&s.go(-1,!1)}).catch(F),Promise.reject()):(h.delta&&s.go(-h.delta,!1),se(P,v,A))).then(P=>{P=P||Ee(v,A,!1),P&&(h.delta&&!I(P,8)?s.go(-h.delta,!1):h.type===X.pop&&I(P,20)&&s.go(-1,!1)),Re(v,A,P)}).catch(F)}))}let re=W(),Pe=W(),Z;function se(i,p,h){oe(i);const v=Pe.list();return v.length?v.forEach(C=>C(i,p,h)):console.error(i),Promise.reject(i)}function tt(){return Z&&c.value!==T?Promise.resolve():new Promise((i,p)=>{re.add([i,p])})}function oe(i){return Z||(Z=!i,et(),re.list().forEach(([p,h])=>i?h(i):p()),re.reset()),i}function we(i,p,h,v){const{scrollBehavior:C}=e;if(!q||!C)return Promise.resolve();const A=!h&&Ct(ke(i.fullPath,0))||(v||!h)&&history.state&&history.state.scroll||null;return st().then(()=>C(i,p,A)).then(P=>P&&wt(P)).catch(P=>se(P,i,p))}const ie=i=>s.go(i);let ce;const J=new Set,Se={currentRoute:c,listening:!0,addRoute:g,removeRoute:R,hasRoute:b,getRoutes:k,resolve:E,options:e,push:M,replace:H,go:ie,back:()=>ie(-1),forward:()=>ie(1),beforeEach:l.add,beforeResolve:d.add,afterEach:m.add,onError:Pe.add,isReady:tt,install(i){const p=this;i.component("RouterLink",an),i.component("RouterView",hn),i.config.globalProperties.$router=p,Object.defineProperty(i.config.globalProperties,"$route",{enumerable:!0,get:()=>Q(c)}),q&&!ce&&c.value===T&&(ce=!0,M(s.location).catch(C=>{}));const h={};for(const C in T)Object.defineProperty(h,C,{get:()=>c.value[C],enumerable:!0});i.provide(ne,p),i.provide(ge,rt(h)),i.provide(pe,c);const v=i.unmount;J.add(i),i.unmount=function(){J.delete(i),J.size<1&&(f=T,V&&V(),V=null,c.value=T,ce=!1,Z=!1),v()}}};function G(i){return i.reduce((p,h)=>p.then(()=>ve(h)),Promise.resolve())}return Se}function dn(e,t){const n=[],r=[],s=[],l=Math.max(t.matched.length,e.matched.length);for(let d=0;d<l;d++){const m=t.matched[d];m&&(e.matched.find(f=>z(f,m))?r.push(m):n.push(m));const c=e.matched[d];c&&(t.matched.find(f=>z(f,c))||s.push(c))}return[n,r,s]}function yn(){return B(ne)}function Rn(){return B(ge)}export{mn as a,yn as b,vn as c,gn as o,Rn as u};
