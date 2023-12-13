import{d as z,h as G,e as J,_ as W,$ as X,i as Y,Z as ee,ag as l,aq as k,o as f,c as D,V as e,P as o,u as r,a9 as te,F as ne,a8 as oe,O as v,T as s,Q as T,U as y,a as ae}from"./@vue-110897a1.js";import{_ as le}from"./editMenu.vue_vue_type_script_setup_true_lang-049d9827.js";import{l as se,j as ie,k as re,y as ue}from"./index-5e2104fc.js";import{E as O,a as B}from"./element-plus-28d330eb.js";import"./@element-plus-ff880098.js";import"./pinia-cd41b998.js";import"./vue-router-17193735.js";import"./vue-i18n-c25bb36f.js";import"./@intlify-d9393dcf.js";import"./vue-cc729cf0.js";import"./js-cookie-edb2da2a.js";import"./nprogress-28073a82.js";import"./axios-28bc18a3.js";import"./lodash-9a19cd29.js";import"./mitt-f7ef348c.js";import"./@wangeditor-231513dc.js";import"./vue-grid-layout-2853dde1.js";import"./lodash-es-21c98b27.js";import"./@vueuse-0a258a1c.js";import"./@popperjs-c75af06c.js";import"./@ctrl-f8748455.js";import"./dayjs-816b3f93.js";import"./async-validator-dee29e8b.js";import"./memoize-one-297ddbcb.js";import"./escape-html-72afddb3.js";import"./normalize-wheel-es-ed76fb12.js";import"./@floating-ui-432baded.js";const me={class:"container"},pe={class:"flex"},Re=z({__name:"index",setup(de){const{proxy:u}=G(),h=J(),a=W({loading:!0,menuList:[],menuOptions:[],title:"",open:!1,isHideOptions:[],statusOptions:[],menuTypeOptions:[],queryParams:{menuName:void 0,status:void 0}}),{loading:N,menuList:I,title:V,statusOptions:M,queryParams:_}=X(a),C=()=>{a.loading=!0,se("/sys/menu",a.queryParams).then(t=>{a.menuList=ie(t.rows,"menuId","parentId","children"),a.loading=!1})},d=()=>{C()},L=()=>{a.queryParams.menuName="",a.queryParams.status="",a.queryParams.menuType="",d()},x=t=>{a.title="添加菜单";let c=t.menuId;t=[],t.parentId=c,h.value.openDialog(t)},P=t=>{a.title="修改菜单",h.value.openDialog(t)},q=t=>{O({message:'是否确认删除名称为"'+t.menuName+'"的数据项?',title:"警告",showCancelButton:!0,confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){return re("/sys/menu",t.menuId).then(()=>{d(),B.success("删除成功")})})},E=t=>{O({message:'是否确认复制名称为"'+t.menuName+'"的数据项?',title:"警告",showCancelButton:!0,confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){return ue("/sys/menu",t.menuId).then(()=>{d(),B.success("复制成功")})})},F=t=>t.menuType=="F"?"":u.selectDictLabel(a.isHideOptions,t.isHide),$=t=>t.menuType=="F"?"":u.selectDictLabel(a.statusOptions,t.status),H=t=>u.selectDictLabel(a.menuTypeOptions,t.menuType);return Y(()=>{C(),u.getDicts("sys_show_hide").then(t=>{a.isHideOptions=t.rows}),u.getDicts("sys_menu_type").then(t=>{a.menuTypeOptions=t.rows}),u.getDicts("sys_normal_disable").then(t=>{a.statusOptions=t.rows}),u.mittBus.on("onEditMenuModule",()=>{d()})}),ee(()=>{u.mittBus.off("onEditDeptModule")}),(t,c)=>{const R=l("el-input"),w=l("el-form-item"),S=l("el-option"),U=l("el-select"),m=l("SvgIcon"),p=l("el-button"),Q=l("el-form"),i=l("el-table-column"),g=l("el-tag"),K=l("el-table"),j=l("el-card"),A=k("auth"),Z=k("loading");return f(),D("div",me,[e(j,{shadow:"always"},{default:o(()=>[e(Q,{model:r(_),ref:"queryForm",inline:!0,"label-width":"68px"},{default:o(()=>[e(w,{label:"菜单名称",prop:"menuName"},{default:o(()=>[e(R,{placeholder:"菜单名称模糊查询",clearable:"",onKeyup:te(d,["enter"]),style:{width:"240px"},modelValue:r(_).menuName,"onUpdate:modelValue":c[0]||(c[0]=n=>r(_).menuName=n)},null,8,["modelValue"])]),_:1}),e(w,{label:"状态",prop:"status"},{default:o(()=>[e(U,{modelValue:r(_).status,"onUpdate:modelValue":c[1]||(c[1]=n=>r(_).status=n),placeholder:"菜单状态",clearable:"",style:{width:"240px"}},{default:o(()=>[(f(!0),D(ne,null,oe(r(M),n=>(f(),v(S,{key:n.dictValue,label:n.dictLabel,value:n.dictValue},null,8,["label","value"]))),128))]),_:1},8,["modelValue"])]),_:1}),e(w,null,{default:o(()=>[e(p,{type:"primary",onClick:d},{default:o(()=>[e(m,{name:"ele-Search"}),s(" 搜索 ")]),_:1}),e(p,{onClick:L},{default:o(()=>[e(m,{name:"ele-Refresh"}),s(" 重置 ")]),_:1}),T((f(),v(p,{type:"primary",plain:"",onClick:x},{default:o(()=>[e(m,{name:"ele-Plus"}),s(" 新增 ")]),_:1})),[[A,"system:dept:add"]])]),_:1})]),_:1},8,["model"]),T((f(),v(K,{data:r(I),"row-key":"menuId",border:"","tree-props":{children:"children",hasChildren:"hasChildren"}},{default:o(()=>[e(i,{prop:"menuName",label:"菜单名称","show-overflow-tooltip":!0},{default:o(n=>[s(y(n.row.menuId)+":"+y(n.row.menuName),1)]),_:1}),e(i,{prop:"icon",label:"图标",align:"center",width:"100"},{default:o(n=>[e(m,{name:n.row.icon},null,8,["name"])]),_:1}),e(i,{prop:"orderNum",label:"排序",width:"60"}),e(i,{prop:"icon",label:"分类",align:"center",width:"100"},{default:o(n=>[e(g,{type:n.row.menuType==="M"?"danger":n.row.menuType==="C"?"success":"warning","disable-transitions":""},{default:o(()=>[s(y(H(n.row)||"-- --"),1)]),_:2},1032,["type"])]),_:1}),e(i,{prop:"permission",label:"权限标识",width:"100","show-overflow-tooltip":!0}),e(i,{prop:"component",label:"组件路径",width:"150","show-overflow-tooltip":!0}),e(i,{prop:"status",label:"状态",width:"80"},{default:o(n=>[e(g,{type:n.row.status==="1"?"danger":"success","disable-transitions":""},{default:o(()=>[s(y($(n.row)||"-- --"),1)]),_:2},1032,["type"])]),_:1}),e(i,{prop:"status",label:"显示隐藏",width:"100"},{default:o(n=>[e(g,{type:n.row.status==="1"?"danger":"success","disable-transitions":""},{default:o(()=>[s(y(F(n.row)||"-- --"),1)]),_:2},1032,["type"])]),_:1}),e(i,{label:"操作",align:"center",fixed:"right",width:"380"},{default:o(n=>[ae("div",pe,[e(p,{type:"text",icon:"el-icon-edit",onClick:b=>P(n.row)},{default:o(()=>[e(m,{name:"ele-Edit"}),s("修改 ")]),_:2},1032,["onClick"]),e(p,{type:"text",icon:"el-icon-plus",onClick:b=>x(n.row)},{default:o(()=>[e(m,{name:"ele-Plus"}),s("新增 ")]),_:2},1032,["onClick"]),e(p,{type:"text",icon:"el-icon-edit",onClick:b=>E(n.row)},{default:o(()=>[e(m,{name:"ele-CopyDocument"}),s("复制 ")]),_:2},1032,["onClick"]),e(p,{type:"text",icon:"el-icon-delete",onClick:b=>q(n.row)},{default:o(()=>[e(m,{name:"ele-Delete"}),s("删除 ")]),_:2},1032,["onClick"])])]),_:1})]),_:1},8,["data"])),[[Z,r(N)]])]),_:1}),e(le,{ref_key:"editMenuRef",ref:h,title:r(V)},null,8,["title"])])}}});export{Re as default};
