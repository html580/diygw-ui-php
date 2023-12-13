import{l as _,x as E,j as L,h as z,i as H,_ as Q}from"./index-5e2104fc.js";import{a as w}from"./element-plus-28d330eb.js";import{d as W,h as $,e as A,_ as G,ag as d,aq as J,o as u,c as p,V as o,P as t,Q as K,T as f,U as h,a as X,O as i,S as O,F as c,a8 as g,u as Y}from"./@vue-110897a1.js";import"./pinia-cd41b998.js";import"./vue-router-17193735.js";import"./vue-i18n-c25bb36f.js";import"./@intlify-d9393dcf.js";import"./vue-cc729cf0.js";import"./js-cookie-edb2da2a.js";import"./@element-plus-ff880098.js";import"./nprogress-28073a82.js";import"./axios-28bc18a3.js";import"./lodash-9a19cd29.js";import"./mitt-f7ef348c.js";import"./@wangeditor-231513dc.js";import"./vue-grid-layout-2853dde1.js";import"./lodash-es-21c98b27.js";import"./@vueuse-0a258a1c.js";import"./@popperjs-c75af06c.js";import"./@ctrl-f8748455.js";import"./dayjs-816b3f93.js";import"./async-validator-dee29e8b.js";import"./memoize-one-297ddbcb.js";import"./escape-html-72afddb3.js";import"./normalize-wheel-es-ed76fb12.js";import"./@floating-ui-432baded.js";const Z={class:"system-menu-container"},ee={style:{"font-size":"large"}},le={class:"dialog-footer"},oe=W({__name:"editModule",props:{title:{type:String,default:()=>""}},setup(k,{expose:D}){const{proxy:F}=$(),b=A(null),e=G({isShowDialog:!1,loading:!1,sexOptions:[],roleOptions:[],statusOptions:[],deptOptions:[],postOptions:[],ruleForm:{userId:void 0,username:"",nickname:"",deptId:"",roleId:"",postId:"",phone:"",email:"",status:"",password:"",avatar:"",sex:"",remark:"",postIds:"",roleIds:""},postIds:[],roleIds:[],isHideOptions:[],menuTypeOptions:[],yesOrNoOptions:[],menuOptions:[],ruleRules:{username:[{required:!0,message:"用户名称不能为空",trigger:"blur"}],nickname:[{required:!0,message:"用户昵称不能为空",trigger:"blur"}],password:[{required:!0,message:"用户密码不能为空",trigger:"blur"}],email:[{type:"email",message:"'请输入正确的邮箱地址",trigger:["blur","change"]}],phone:[{pattern:/^1[3|4|5|6|7|8|9][0-9]\d{8}$/,message:"请输入正确的手机号码",trigger:"blur"}]}}),U=r=>{r&&r.userId&&r.userId!=null&&r.userId!=0?Promise.all([_("/sys/post",{}),_("/sys/role",{}),E("/sys/user",r.userId)]).then(s=>{e.postOptions=s[0].rows,e.roleOptions=s[1].rows,e.ruleForm=s[2].data,e.ruleForm.postIds!=""?e.postIds=e.ruleForm.postIds.split(",").map(a=>Number(a)):e.postIds=[],e.ruleForm.roleIds!=""?e.roleIds=e.ruleForm.roleIds.split(",").map(a=>Number(a)):e.roleIds=[],e.ruleForm.password=""}).then(s=>{}):y(),S(),e.isShowDialog=!0,e.loading=!1,F.getDicts("sys_user_sex").then(s=>{e.sexOptions=s.rows}),F.getDicts("sys_normal_disable").then(s=>{e.statusOptions=s.rows})},I=r=>{F.mittBus.emit("onEditUserModule",r),e.isShowDialog=!1},N=()=>{I(),y()},S=async()=>{_("/sys/dept",{}).then(r=>{e.deptOptions=L(r.rows,"deptId","parentId","children")})},C=()=>{const r=Y(b);r&&r.validate(s=>{s&&(e.ruleForm.postId=e.postIds[0],e.ruleForm.roleId=e.roleIds[0],e.ruleForm.postIds=e.postIds.join(","),e.ruleForm.roleIds=e.roleIds.join(","),e.loading=!0,e.ruleForm.userId!=null?z("/sys/user",e.ruleForm).then(a=>{w.success("修改成功"),e.loading=!1,I()}).finally(()=>{e.loading=!1}):H("/sys/user",e.ruleForm).then(a=>{w.success("新增成功"),e.loading=!1,I()}).finally(()=>{e.loading=!1}))})},y=()=>{Promise.all([_("/sys/post",{}),_("/sys/role",{})]).then(r=>{e.postOptions=r[0].rows,e.roleOptions=r[1].rows}),e.ruleForm.userId=void 0,e.ruleForm.username="",e.ruleForm.nickname="",e.ruleForm.deptId="",e.ruleForm.phone="",e.ruleForm.email="",e.ruleForm.status="",e.ruleForm.password="",e.ruleForm.avatar="",e.ruleForm.sex="",e.ruleForm.remark="",e.ruleForm.postIds="",e.ruleForm.roleIds=""};return D({openDialog:U}),(r,s)=>{const a=d("el-input"),n=d("el-form-item"),m=d("el-col"),B=d("el-cascader"),x=d("el-option"),V=d("el-select"),M=d("el-radio"),T=d("el-radio-group"),q=d("el-row"),P=d("el-form"),v=d("el-button"),R=d("el-dialog"),j=J("drag");return u(),p("div",Z,[o(R,{modelValue:e.isShowDialog,"onUpdate:modelValue":s[11]||(s[11]=l=>e.isShowDialog=l),width:"769px",center:""},{title:t(()=>[K((u(),p("div",ee,[f(h(k.title),1)])),[[j,[".system-menu-container .el-dialog",".system-menu-container .el-dialog__header"]]])]),footer:t(()=>[X("span",le,[o(v,{onClick:N},{default:t(()=>[f("取 消")]),_:1}),o(v,{type:"primary",onClick:C,loading:e.loading},{default:t(()=>[f("编 辑")]),_:1},8,["loading"])])]),default:t(()=>[o(P,{ref_key:"ruleFormRef",ref:b,model:e.ruleForm,rules:e.ruleRules,"label-width":"80px"},{default:t(()=>[o(q,{gutter:35},{default:t(()=>[o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"用户昵称",prop:"nickname"},{default:t(()=>[o(a,{modelValue:e.ruleForm.nickname,"onUpdate:modelValue":s[0]||(s[0]=l=>e.ruleForm.nickname=l),placeholder:"请输入用户昵称"},null,8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"归属部门",prop:"deptId"},{default:t(()=>[o(B,{modelValue:e.ruleForm.deptId,"onUpdate:modelValue":s[1]||(s[1]=l=>e.ruleForm.deptId=l),options:e.deptOptions,props:{label:"deptName",value:"deptId",checkStrictly:!0,emitPath:!1},class:"w100",clearable:"",filterable:"",placeholder:"请选择归属部门","show-all-levels":!1},null,8,["modelValue","options"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[e.ruleForm.userId==null?(u(),i(n,{key:0,label:"用户名称",prop:"username"},{default:t(()=>[o(a,{modelValue:e.ruleForm.username,"onUpdate:modelValue":s[2]||(s[2]=l=>e.ruleForm.username=l),placeholder:"请输入用户名称"},null,8,["modelValue"])]),_:1})):O("",!0)]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[e.ruleForm.userId==null?(u(),i(n,{key:0,label:"用户密码",prop:"password"},{default:t(()=>[o(a,{modelValue:e.ruleForm.password,"onUpdate:modelValue":s[3]||(s[3]=l=>e.ruleForm.password=l),placeholder:"请输入用户密码",type:"password"},null,8,["modelValue"])]),_:1})):O("",!0)]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"手机号码",prop:"phone"},{default:t(()=>[o(a,{modelValue:e.ruleForm.phone,"onUpdate:modelValue":s[4]||(s[4]=l=>e.ruleForm.phone=l),placeholder:"请输入手机号码",maxlength:"11"},null,8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"邮箱",prop:"email"},{default:t(()=>[o(a,{modelValue:e.ruleForm.email,"onUpdate:modelValue":s[5]||(s[5]=l=>e.ruleForm.email=l),placeholder:"请输入邮箱",maxlength:"50"},null,8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"用户性别",prop:"sex"},{default:t(()=>[o(V,{class:"w100",modelValue:e.ruleForm.sex,"onUpdate:modelValue":s[6]||(s[6]=l=>e.ruleForm.sex=l),placeholder:"请选择"},{default:t(()=>[(u(!0),p(c,null,g(e.sexOptions,l=>(u(),i(x,{key:l.dictValue,label:l.dictLabel,value:l.dictValue},null,8,["label","value"]))),128))]),_:1},8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"状态"},{default:t(()=>[o(T,{modelValue:e.ruleForm.status,"onUpdate:modelValue":s[7]||(s[7]=l=>e.ruleForm.status=l)},{default:t(()=>[(u(!0),p(c,null,g(e.statusOptions,l=>(u(),i(M,{key:l.dictValue,label:l.dictValue},{default:t(()=>[f(h(l.dictLabel),1)]),_:2},1032,["label"]))),128))]),_:1},8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"岗位"},{default:t(()=>[o(V,{class:"w100",modelValue:e.postIds,"onUpdate:modelValue":s[8]||(s[8]=l=>e.postIds=l),multiple:"","collapse-tags":"true",placeholder:"请选择"},{default:t(()=>[(u(!0),p(c,null,g(e.postOptions,l=>(u(),i(x,{key:l.postId,label:l.postName,value:l.postId,disabled:l.status==1},null,8,["label","value","disabled"]))),128))]),_:1},8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:12,md:12,lg:12,xl:12},{default:t(()=>[o(n,{label:"角色"},{default:t(()=>[o(V,{class:"w100",modelValue:e.roleIds,"onUpdate:modelValue":s[9]||(s[9]=l=>e.roleIds=l),multiple:"","collapse-tags":"true",placeholder:"请选择"},{default:t(()=>[(u(!0),p(c,null,g(e.roleOptions,l=>(u(),i(x,{key:l.roleId,label:l.roleName,value:l.roleId,disabled:l.status==1},null,8,["label","value","disabled"]))),128))]),_:1},8,["modelValue"])]),_:1})]),_:1}),o(m,{xs:24,sm:24,md:24,lg:24,xl:24},{default:t(()=>[o(n,{label:"备注"},{default:t(()=>[o(a,{modelValue:e.ruleForm.remark,"onUpdate:modelValue":s[10]||(s[10]=l=>e.ruleForm.remark=l),type:"textarea",placeholder:"请输入内容"},null,8,["modelValue"])]),_:1})]),_:1})]),_:1})]),_:1},8,["model","rules"])]),_:1},8,["modelValue"])])}}});const Ue=Q(oe,[["__scopeId","data-v-7fc95b76"]]);export{Ue as default};
